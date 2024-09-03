@extends('layouts.AdminLayout')
@section('AdminContent')

    <div class="wrapper row3">
        <form method="post">
            @csrf
            <p>Удаление магазина {{$shop_name}}:</p>
            <p><input type="text" name="confirm"></p>
            <p>Подтвердите удаление: введите "удалить"</p>
            <p><input type="submit" value="Удалить магазин"></p>
        </form>
@endsection
