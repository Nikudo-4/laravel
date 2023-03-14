@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать книгу</div>
                    <div class="card-boby">
                    <form method="post" action="{{route('books.update',['book' => $book])}}" enctype="multipart/form-data">
                        <p>Название: <br><input type="text" name="title" class="form-control" value="{{$book->title}}"></p>
                        <p>Файл: <br><input type="file" name="cover" class="form-control" value="{{$book->cover}}"></p>
                        <br><hr>
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Редактировать Книгу</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop