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

    <title>Регистрация</title>
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
                <a class="nav-link" href="{{url()->route('login')}}">Войти</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="content mt-5">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-5">

                @if($errors->all())
                    <div class="alert alert-danger text-dark" role="alert">

                        @foreach($errors->all() as $error)
                            <strong>Уведомление!</strong> {{$error}} <br><br>
                        @endforeach

                    </div>
                @endif

                <h2 class="title">Регистрация</h2>

                <form method="post" action="{{url('/add')}}">

                    @csrf

                    <div class="form-group">
                        <label for="exampleInputText">Имя</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputText"
                               aria-describedby="textHelp" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email:</label>
                        <input type="email" name="email" {{old('email')}} class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="email">
                        <small id="emailHelp" class="form-text text-muted">Мы никогда не будем делиться вашей
                            электронной почтой с кем-либо еще.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль:</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                               placeholder="password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-2">Зарегистрироваться</button>
                </form>


            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>

<div class="footer"></div>

</body>
</html>
