@extends('layouts/layout')

@section('content')

    <div class="col-lg-2"></div>
    <div class="col-lg-4 mt-5">


        <form method="post" action="{{route('downloadUrl')}}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="exampleInputUrl">URL Address: </label>
                <input type="url" name="url" class="form-control" id="exampleInputUrl" placeholder="URL" required>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-success">Скачать</button>
        </form>
    </div>

@endsection
