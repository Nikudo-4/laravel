<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
use App\Http\Requests\UpdateBook;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(5);
        return view('books.index',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBook $request)
    {
        $data = $request->validated();
        $data['uuid'] = Str::uuid();
        if($request->hasFile('cover')){
            $cover = $request->file('cover');

            $data['cover'] = $cover->getClientOriginalName();
            //сохранение в public
            $cover->storeAs('books',$data['cover'],'public');
        }
        Book::create($data);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit',['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Book $book,UpdateBook $request,)
    {
        $data = $request->validated();
        $book->title = $data['title'];
        if($request->hasFile('cover')){
            $cover = $request->file('cover');

            $book->cover = $cover->getClientOriginalName();
            //сохранение в public
            $cover->storeAs('books', $book->cover, 'public');
        }
        $book->save();
        // $a->update($data);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back();
    }
}
