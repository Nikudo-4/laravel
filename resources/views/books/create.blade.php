@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новый пост</div>
                    <div class="card-boby">
                    <form method="post" action="{{route('books.store')}}" enctype="multipart/form-data">
                        <p>Название: <br><input type="text" name="title" class="form-control" value="{{old('title')}}"></p>
                        @csrf
                        <p>Файл: <br><input type="file" name="cover" class="form-control" value="{{old('cover')}}"></p>
                        <br><hr>
                        <button type="submit" class="btn btn-success">Добавить Книгу</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop