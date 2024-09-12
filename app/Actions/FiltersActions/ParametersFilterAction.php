<?php

namespace App\Actions\FiltersActions;


use Illuminate\Http\Request;

class ParametersFilterAction
{
    public function handle(Request $request, $filtered_result)
    {
        if (isset($request['parameters_filter'])) {
            $result = collect();
            foreach ($request['parameters_filter'] as $filter) {
                $result = $result->merge(
                    $filtered_result->filter(function ($value) use ($filter) {
                        return $value['parameter'] == $filter;
                    })
                );
            }
            $filtered_result = $result;
        }
        return $filtered_result;
    }
}
