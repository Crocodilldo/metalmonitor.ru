@extends('layouts.AdminLayout')
@section('AdminContent')

    <div class="wrapper row3" >
        <form method="post" enctype="multipart/form-data">
            @csrf
            <p>Редактировать магазин {{$shop_name}}:</p>
            <input type="hidden" name="shop_old_name" value="{{$shop_name}}">
            <input type="hidden" name="shop_old_logo" value="{{$shop_logo}}">
            <p> <input type="text" name="name" placeholder="Название магазина" value="{{$shop_name}}"></p>
            <p> <input type="url" name="url" placeholder="Адрес сайта" value="{{$shop_url}}"></p>
            <br>
            <img src="{{asset('storage/'.$shop_logo)}}">
            <p>Загрузка нового логотипа:</p>
            <p> <input type="file" name="new_logo"></p>
            <br>
            <p> <input type="submit" value="Сохранить изменения"></p>
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
