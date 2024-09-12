<?php

namespace App\Actions\FiltersActions;


use Illuminate\Http\Request;

class PriceFilterAction
{
    public function handle(Request $request, $filtered_result)
    {
        $min_price_filter = $request['min_price_filter'];
        $max_price_filter = $request['max_price_filter'];

        $result = $filtered_result->filter(function ($value) use ($min_price_filter, $max_price_filter) {
            return $value['price'] >= $min_price_filter && $value['price'] <= $max_price_filter;
        });

        $filtered_result = $result;

        return $filtered_result;
    }
}
