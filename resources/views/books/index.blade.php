@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cписок постов</div>
                    <div class="card-boby justify-content-center">
                        <a href="{{route('books.create')}}" class="btn btn-primary">Добавить</a>
                    </div>
                    <br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Название</td>
                                <td>Описание</td>
                                <td>Текст</td>
                                <td>Редактировать</td>
                                <td>Удалить</td>

                            </tr>
                            <tbody>
                                @forelse($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->cover }}</td>
                                    <td>{{ $book->uuid }}</td>
                                    <td><a href="{{route('books.edit',['book'=>$book])}}">Редактировать</a>||
                                        <form action="{{route('books.destroy',['book'=>$book])}}" method="post">
                                        <button type="submit">
                                            Удалить
                                        </button>
                                        @csrf
                                        @method('DELETE')
                                        </form></td>
                                    <td>{{ $book->uuid }}</td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">Нет постов</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop