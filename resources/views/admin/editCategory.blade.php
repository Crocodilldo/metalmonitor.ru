@extends('layouts.AdminLayout')
@section('AdminContent')

    <div class="wrapper row3">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <p>Изменение категории {{$category_name}}:</p>
            <input type="hidden" name="category_old_name" value="{{$category_name}}">
            <input type="hidden" name="category_old_img" value="{{$category_img}}">
            <p><input type="text" name="name" placeholder="Название категории" value="{{$category_name}}"></p>
            <br>

            @if($category_img == 'no_image')
                <img src="{{asset('images\demo\no_image.webp')}}">
            @else
                <img src="{{asset('storage/'.$category_img)}}">
            @endif


            <p>Загрузка нового изображения:</p>
            <p><input type="file" name="new_img"></p>
            <br>
            <p><input type="submit" value="Сохранить изменения"></p>
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
