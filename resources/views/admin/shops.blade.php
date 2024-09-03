@extends('layouts.AdminLayout')
@section('AdminContent')

    <div class="wrapper row3">
        <button><a href="/admin/addShop">Добавить магазин</a></button>
        <br>
        @if(Session::has('flash message'))
            {{Session::get('flash message')}}
        @endif
        <div class="content three_quarter">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    <th>Slug</th>
                    <th>Период <br>обновления</th>
                    <th>Последнее<br>обновление</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>

                @foreach($list as $line)
                    <tr>
                        <td>{{$line['id']}}</td>
                        <td>{{$line['name']}}<img src="{{asset('storage/'.$line['logo'])}}"></td>
                        <td>{{$line['slug']}}</td>
                        <td>{{$line['update_period']}} сек.</td>
                        <td>{{$line['updated_at']}}</td>
                        <td>
                            <a href="{{route('update_products', [
                                        'shop_id'=>$line['id'],
                                        'shop_name'=>$line['name']
                                    ])}}">
                            <img src="{{asset('images\ico\refresh.png')}}"
                                 title="Обновить товары в данном магазине">
                                                        </a>

                            <a href="{{route('edit_shop',['shop_id'=>$line['id'],
                                                            'shop_logo'=>$line['logo'],
                                                            'shop_url'=>$line['url'],
                                                            'shop_update_period'=>$line['update_period'],
                                                            'shop_name'=>$line['name']])}}">
                                <img src="{{asset('images\ico\edit.png')}}" title="Редактировать данные магазина">
                            </a>

                            <a href="{{route('confirm_delete',['shop_id'=>$line['id'],
                                                               'shop_name'=>$line['name']])}}">
                                <img src="{{asset('images\ico\delete.png')}}" title="Удалить данный магазин">
                            </a>

                            <a href="{{route('update_links', [
                                        'shop_id'=>$line['id'],
                                        'shop_name'=>$line['name']
                                    ])}}">
                                <button title="Редактирование ссылок для парсинга товаров данного магазина">Ссылки
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
