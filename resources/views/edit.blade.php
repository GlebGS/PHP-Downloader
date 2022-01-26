@extends('layouts/layout')

@section('content')

    <div class="row mt-5">

        <div class="col-lg-4">

            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success text-dark" role="alert">
                    <strong>Уведомление!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
                </div>
            @endif

            @if($errors->all())
                <div class="alert alert-danger text-dark" role="alert">

                    @foreach($errors->all() as $error)
                        <strong>Уведомление!</strong> {{$error}} <br><br>
                    @endforeach

                </div>
            @endif

            <form method="post" action="/editUser/id={{$id}}" enctype="multipart/form-data">

                @csrf

                <div class="form-group row">
                    <div class="form-group" style="margin-left: 5rem;">
                        <label for="exampleFormControlFile1">Аватар: </label>
                        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Имя:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Имя"
                               value="{{$edit_user->username}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email"
                               value="{{$edit_user->email}}">
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary mt-3">Изменить</button>
            </form>
        </div>

    </div>

@endsection
