@extends('layouts.AdminLayout')
@section('AdminContent')

    <div class="wrapper row3">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <p>Добавить новую категорию:</p>
            <p><input type="text" name="name" placeholder="Название категории"></p>
            <br>
            <p><input type="submit" value="Добавить категорию"></p>
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
