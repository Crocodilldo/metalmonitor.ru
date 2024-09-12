<?php

namespace App\Actions\FiltersActions;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryFilterAction
{
    public function handle(Request $request)
    {
        $search_result = Session::get('search_result');

        if (isset($request['category_filter'])) {
            $result = collect();
            foreach ($request['category_filter'] as $filter) {
                $result = $result->merge(
                    $search_result->filter(function ($value) use ($filter) {
                        return $value['category_id'] == $filter;
                    })
                );
            }
            $filtered_result = $result;
        } else
            $filtered_result = $search_result;
        return $filtered_result;
    }
}
