@extends('layouts.AdminLayout')
@section('AdminContent')
    <div class="wrapper row3">
        <button><a href="/admin/addCategory">Добавить категорию</a></button>
        <br>
        @if(Session::has('flash message'))
            {{Session::get('flash message')}}
        @endif
        <div class="content three_quarter">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Категория</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $line)
                    <tr>
                        <td>{{@$line['id']}}</td>
                        <td>{{@$line['name']}}</td>
                        <td>
                            <a href="{{route('edit_category',['category_id'=>$line['id'],
                                                                  'category_name'=>$line['name'],
                                                                  'category_img'=>$line['img']])}}">
                                <img src="{{asset('images\ico\edit.png')}}" title="Редактировать категорию">
                            </a>

                            <a href="{{route('deleteCategory',['category_id'=>$line['id'],
                                                 'category_name'=>$line['name']])}}"
                               onclick="return window.confirm('Подтвердите удаление')"
                            >
                                <img src="{{asset('images\ico\delete.png')}}" title="Удалить данную категорию">
                            </a>
                        </td>
                @endforeach
                </tbody>
            </table>
@endsection
