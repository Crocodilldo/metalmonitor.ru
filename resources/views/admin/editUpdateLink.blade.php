@extends('layouts.AdminLayout')
@section('AdminContent')

    <div class="wrapper row3">
        <form method="post">
            @csrf
            <p>Редактирование URL:</p>
            <p><input type="URL" name="url" placeholder="Введите URL" value="{{$update_link_url}}"></p>
            <br>
            <p><select name="category">


                    @foreach($categories as $category)
                        @if($category->id ==$update_link_category))
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach

                </select></p>
            <br>
            <p><input type="submit" value="Изменить URL"></p>
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
