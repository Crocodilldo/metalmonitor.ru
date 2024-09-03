@extends('layouts.AdminLayout')
@section('AdminContent')
    <div class="wrapper row3">
        <button>
         <a href="
         {{route('shops',[Session::flash('flash message', ' Нажмите на кнопку " Ссылки", чтобы добавить новый URL в выбранный магазин')])}}
        ">Добавить URL

         </a>
        </button>
        <br>
        <div class="content three_quarter">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Магазин</th>
                    <th>Категория</th>
                    <th>URL</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $line)
                    <tr>
                        <td>{{@$line['id']}}</td>

                        <td><img src="{{asset('storage/'.@$line['shop']->logo)}}"></td>
                        <td>{{@$line['category']->name}}</td>
                        <td>...{{substr(@$line['url'], -65)}}</td>
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
