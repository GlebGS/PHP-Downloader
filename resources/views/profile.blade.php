@extends('layouts/layout')

@section('content')

    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="{{$user->img}}" alt="Изображение не доступно">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><label class="prof_data">Имя:</label> {{$user->username}}</li>
                <li class="list-group-item"><label class="prof_data">Email:</label> {{$user->email}}</li>
                <li class="list-group-item"> </li>
            </ul>
        </div>

        <a type="submit" href="/user/edit/id={{$id}}" class="btn btn-outline-primary">Редактировать</a>
        <a type="submit" onclick="return confirm('Вы уверены?');" href="/delete/id={{$id}}" class="btn btn-outline-danger mt-1">Удалить</a>
    </div>

@endsection
