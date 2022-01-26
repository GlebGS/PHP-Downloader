@extends('layouts/layout')

@section('content')

    <div class="col-lg-2"></div>
    <div class="col-lg-6 mt-5">
        <form method="post" action="{{route('image.upload')}}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="exampleFormControlFile1">Загрузить файл</label>
                <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <button type="submit" class="btn btn-outline-success">Загрузить</button>
        </form>

        @isset($path)
            <div class="mt-5">
                <hr>
                <a type="button" class="btn btn-outline-info" href="/user/addNote/id={{$id}}">Вернутся</a>
                <h2>Файл добавлен:</h2>
                <img class="image-fluid mt-3" style="width: 15rem; height: 10rem;" src="{{asset('/storage/' . $path)}}" alt="IMG...">
            </div>
        @endisset
    </div>

@endsection
