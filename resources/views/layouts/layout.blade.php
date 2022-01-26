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

    <title>Downloader</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <label class="navbar-brand">Downloader</label>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                @if($id)
                    <a class="nav-link" href="/user/id={{$id}}">Home <span class="sr-only">(current)</span></a>
                @else
                    <span class="nav-link">Home</span>
                @endif
            </li>
            <li class="nav-item">
                @if($id)
                <a class="nav-link" href="/user/download/id={{$id}}">Скачать файл</a>
                @else
                    <span class="nav-link">Скачать файл</span>
                @endif
            </li>
        </ul>
        <span class="navbar-text">

            @if($id)
                <ul class="navbar-nav mr-auto">
                    <div class="btn-group profile">
                      <label class="nav-link mt-1">{{$user->username}}</label>
                        <img class="card-img-top avatar" src="{{$user->img}}">
                      <button type="button" class="btn btn-white dropdown-toggle dropdown-toggle-split"
                              data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/user/profile/id={{$id}}">Профиль</a>
                        <a class="dropdown-item" href="/user/edit/id={{$id}}">Редактировать</a>
                        @if($role === 1)
                              <a class="dropdown-item" href="/user/users/id={{$id}}">Пользователи</a>
                          @endif
                          <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/user/logout/id={{$id}}">Выйти</a>
                      </div>
                    </div>

                </ul>
            @else
                <ul class="navbar-nav mr-auto">
                    <a class="nav-link" href="/login">Вход</a>
                </ul>
            @endif

    </span>
    </div>
</nav>


<div class="container">

    @yield('content')

</div>


<div class="footer"></div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
