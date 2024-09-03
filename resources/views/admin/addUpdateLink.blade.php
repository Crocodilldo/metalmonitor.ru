@extends('layouts.AdminLayout')
@section('AdminContent')

    <div class="wrapper row3">
        <form method="post">
            @csrf
            <p>Добавить URL в магазин "{{$shop_name}}":</p>
            <p><input type="URL" name="url" placeholder="Введите URL"></p>
            <br>
            <p><select name="category">
                    <option disabled selected>Выберите категорию:</option>

                    @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select></p>
            <br>
            <p><input type="submit" value="Добавить URL"></p>
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
