@extends('layouts/layout')

@section('content')

    <div class="content">

        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success text-dark" role="alert">
                <strong>Уведомление!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>
        @endif

        <div class="row">


            @if($role === 1)
                <div class="container">
                    <a type="button" class="btn btn-success" href="/user/addNote/id={{$id}}">Добавить запись</a>
                </div>
            @endif


            @foreach($content as $data)
                <div class="col-lg-4 mt-5">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{$data['url']}}" style="height: 10rem;" >
                        <div class="card-body">
                            @if($role === 1)
                                <a href="/file/download/id={{$data['id']}}" class="btn btn-outline-success">Скачать</a>
                                <a href="/deleteFile/id={{$data['id']}}" onclick="return confirm('Вы уверены?');"
                                class="btn btn-outline-danger">Удалить</a>
                            @elseif($role === 0 AND $id)
                                <a href="/file/download/id={{$data['id']}}" class="btn btn-outline-success">Скачать</a>
                            @else
                                <a href="{{route('login')}}" class="btn btn-outline-danger">Авторизоваться</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="paginate text-center mt-5">
        {{$content->links()}}
    </div>

@endsection
