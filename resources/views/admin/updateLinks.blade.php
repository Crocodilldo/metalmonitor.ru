@extends('layouts.AdminLayout')
@section('AdminContent')
    <div class="wrapper row3">
        <button><a href="{{route('add_update_link',['shop_name'=>$shop_name,
                                                    'shop_id'=>$shop_id])}}">Добавить URL в магазин "{{$shop_name}}"</a>
        </button>
        <br>
        @if (Session::has('flash message'))
            {{Session::get('flash message')}}
        @endif
        <div class="content three_quarter">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Категория</th>
                    <th>URL</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $line)
                    <tr>
                        <td>{{$line['id']}}</td>
                        <td>{{$line['category_id']}}</td>
                        <td>...{{substr($line['url'], -75)}}</td>
                        <td>
                            <a href="{{route('edit_update_link',['update_link_id'=>$line['id'],
                                                                  'update_link_category'=>$line['category_id'],
                                                                  'update_link_url'=>$line['url']])}}">
                                <img src="{{asset('images\ico\edit.png')}}" title="Редактировать URL">
                            </a>
                            <a href="{{route('delete_update_link',['update_link_id'=>$line['id']])}}"
                               onclick="return window.confirm('Подтвердите удаление')"
                            >
                                <img src="{{asset('images\ico\delete.png')}}" title="Удалить URL">
                            </a>
                        </td>
                @endforeach
                </tbody>
            </table>
@endsection
