<?php

namespace App\Actions\FiltersActions;


use Illuminate\Http\Request;

class ShopFilterAction
{
    public function handle(Request $request, $filtered_result)
    {
        if (isset($request['shop_filter'])) {
            $result = collect();
            foreach ($request['shop_filter'] as $filter) {
                $result = $result->merge(
                    $filtered_result->filter(function ($value) use ($filter) {
                        return $value['shop_id'] == $filter;
                    })
                );
            }
            $filtered_result = $result;
        }
        return $filtered_result;
    }
}
