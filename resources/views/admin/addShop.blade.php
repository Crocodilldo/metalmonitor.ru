@extends('layouts.AdminLayout')
@section('AdminContent')

    <div class="wrapper row3">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <p>Добавить новый магазин:</p>
            <p><input type="text" name="name" placeholder="Название магазина"></p>
            <p><input type="url" name="url" placeholder="Адрес сайта"></p>
            <p>Загрузка логотипа:</p>
            <p><input type="file" name="logo"></p>
            <br>
            <p><input type="submit" value="Добавить магазин"></p>
        </form>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
@endsection
