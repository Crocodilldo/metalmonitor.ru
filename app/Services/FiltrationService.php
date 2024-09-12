<?php

namespace App\Services;



use App\Actions\FiltersActions\CategoryFilterAction;
use App\Actions\FiltersActions\ParametersFilterAction;
use App\Actions\FiltersActions\PriceFilterAction;
use App\Actions\FiltersActions\ShopFilterAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class FiltrationService
{
    public function applyFilters(Request $request,
                                 CategoryFilterAction $categoryFilterAction,
                                 ParametersFilterAction $parametersFilterAction,
                                 ShopFilterAction $shopFilterAction,
                                 PriceFilterAction $priceFilterAction)
    {
        $search_result = Session::get('search_result');
        $filters_list = Session::get('filters_list');

        $category_filter = $request['category_filter'];
        $parameters_filter = $request['parameters_filter'];
        $shop_filter = $request['shop_filter'];
        $min_price_filter = $request['min_price_filter'];
        $max_price_filter = $request['max_price_filter'];

        $used_filters = ['category_filter'=>$category_filter,
            'parameters_filter'=>$parameters_filter,
            'shop_filter'=>$shop_filter,
            'min_price_filter'=>$min_price_filter,
            'max_price_filter'=>$max_price_filter];

        if (array_filter($used_filters) !== []) {
            $filtered_result=$categoryFilterAction->handle($request);
            $filtered_result=$parametersFilterAction->handle($request,$filtered_result);
            $filtered_result=$shopFilterAction->handle($request,$filtered_result);
            $filtered_result=$priceFilterAction->handle($request,$filtered_result);

            return view('search.SearchResult', ['filters_list' => $filters_list, 'filtered_result' => $filtered_result,
                'used_filters' => $used_filters]);

        } else
            return view('search.SearchResult', ['filters_list' => $filters_list,
                    'search_result' => $search_result]
            );
    }

    public function resetFilters(){
        $search_result = Session::get('search_result');
        $filters_list = Session::get('filters_list');
        return view('search.SearchResult', ['filters_list' => $filters_list, 'search_result' => $search_result]);
    }

}
