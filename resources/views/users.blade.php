@extends('layouts/layout')

@section('content')

    {{--    {{dd($role)}}--}}

    <div class="content mt-5">
        <div class="row">

            @foreach($users as $v)
                <div class="col-lg-4">

                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success text-dark" role="alert">
                            <strong>Уведомление!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
                        </div>
                    @endif

                    <div class="card border-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <img class="card-img-top avatar" src="{{$v->img}}" alt="Image">
                        </div>
                        <div class="card-body text-dark">
                            <label class="prof_data">Имя:</label>&ensp;<span
                                class="card-text">{{$v->username}}</span><br>
                            <label class="prof_data">Email:</label>&ensp;<span
                                class="card-text">{{$v->email}}</span><br>
                        </div>
                        <div class="card-footer">
                            <a href="/user/edit/id={{$v->id}}" type="button"
                               class="btn btn-outline-success">Изменить</a>
                            <a href="/delete/id={{$v->id}}" onclick="return confirm('Вы уверены?');"
                               type="button" class="btn btn-outline-danger">Удалить</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="paginate text-center mt-5">
        {{$users->links()}}
    </div>

@endsection
