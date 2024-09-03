@extends('layouts.MainLayout')
@section('Content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <div class="sidebar one_quarter first">

                <h6>Фильтры:</h6>
                <nav class="sdb_holder">
                    <form method="get" action="apply_filters">
                        @csrf
                        <li>
                            <button formaction="{{route('reset_filters')}}">Сбросить фильтры</button>
                        <li>
                            <details>
                                <summary>Категории:</summary>

                                @foreach($filters_list['category_filter_list'] as $category_id)
                                    <li>
                                        <input name="category_filter[]"
                                               style="display: inline" type="checkbox"
                                               value="{{$category_id['id']}}"
                                               @if(isset($used_filters['category_filter'])&&
                                                         in_array($category_id['id'],$used_filters['category_filter'])===true)
                                                   checked
                                            @endif

                                        >
                                        {{$category_id['name']}}
                                    </li>
                                @endforeach

                            </details>
                        </li>

                        <li>
                            <details>
                                <summary>Размер:</summary>
                                @foreach($filters_list['details_filter_list'] as $details_filters_list)
                                    <li>
                                        <input name="details_filter[]"
                                               style="display: inline"
                                               type="checkbox"
                                               value="{{$details_filters_list}}"

                                               @if(isset($used_filters['details_filter'])&&
                                                   in_array($details_filters_list,$used_filters['details_filter'])===true)
                                                   checked

                                            @endif
                                        >{{$details_filters_list}}
                                    </li>
                                @endforeach
                            </details>
                        </li>

                        <li>
                            <details>
                                <summary>Магазин:</summary>
                                @foreach($filters_list['shop_filter_list'] as $shop_id)
                                    <li>
                                        <input name="shop_filter[]"
                                               style="display: inline"
                                               type="checkbox"
                                               value="{{$shop_id['id']}}"
                                               @if(isset($used_filters['shop_filter'])&&
                                                          in_array($shop_id['id'],$used_filters['shop_filter'])===true)
                                                   checked

                                            @endif
                                        >
                                        {{$shop_id['name']}}
                                    </li>
                                @endforeach
                            </details>
                        </li>

                        <li>
                            <details>
                                <summary>Цена:</summary>
                                <p>От: <input name="min_price_filter"
                                              class="number-input"
                                              type="number"
                                              step="any"

                                              @if(isset($used_filters['min_price_filter']))
                                                  value="{{$used_filters['min_price_filter']}}"
                                              @else value="{{$filters_list['min_price']}}"
                                              @endif

                                    ></p>
                                <p>До: <input name="max_price_filter"
                                              class="number-input"
                                              type="number"

                                              @if(isset($used_filters['max_price_filter']))
                                                  value="{{$used_filters['max_price_filter']}}"
                                              @else value="{{$filters_list['max_price']}}"
                                              @endif
                                              step="any"
                                    ></p>
                            </details>
                        </li>

                        <li>
                            <input type="submit" name="submit" value="Применить фильтры">
                        </li>

                        </ul>
                    </form>
                </nav>
            </div>


            {{--    Таблица товаров--}}
            <div class="wrapper row3">
                <div class="content three_quarter">
                    <div class="scrollable">
                        <table>
                            <thead>
                            <tr>
                                <th>Товар</th>
                                <th>Цена</th>
                                <th>Магазин</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($filtered_result))
                                $search_result = $filtered_result;
                            ?>
                            @foreach($search_result as $result)
                                <tr>
                                    <td>
                                        <a style="text-decoration-color: #1B1A1D"
                                           href="{{$result['shop']->url}}.{{$result['url']}}">
                                            {{$result['name']}}
                                        </a>
                                    </td>

                                    <td>{{$result['price']}}</td>
                                    <td>
                                        <a href="{{$result['shop']->url}}">
                                            <img src="{{asset('storage/'.$result['shop']->logo)}}"
                                                 alt="{{$result['shop']->name}}"
                                                 title="{{$result['shop']->name}}">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

    </div>

@endsection
