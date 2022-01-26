<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

    <title>Вход</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="#">Downloader</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarText">
        <ul class="navbar-nav mr-auto float-right">
            <li class="nav-item">
                <a class="nav-link" href="{{url()->route('register')}}">Регистрация</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="content mt-5">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-5">

                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-success text-dark" role="alert">
                        <strong>Уведомление!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
                    </div>
                @endif

                @if(\Illuminate\Support\Facades\Session::has('error'))
                    <div class="alert alert-danger text-dark" role="alert">
                        <strong>Уведомление!</strong> {{\Illuminate\Support\Facades\Session::get('error')}}
                    </div>
                @endif

                @if($errors->all())
                    <div class="alert alert-danger text-dark" role="alert">

                        @foreach($errors->all() as $error)
                            <strong>Уведомление!</strong> {{$error}} <br><br>
                        @endforeach

                    </div>
                @endif

                <h2 class="title">Вход</h2>

                <form method="post" action="{{url('/log')}}">

                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email:</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp"
                               placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль:</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-2">Войти</button>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>

</body>
</html>
