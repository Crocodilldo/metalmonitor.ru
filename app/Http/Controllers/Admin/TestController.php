<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StandardProductParameters;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $standard_product_parameters = StandardProductParameters::get();
        $starttime = microtime(true);
        $product_for_parsing = 'Полоса металлическая 40*5';
        $product_for_parsing = str_replace(['х', 'x', 'х', '/'], '*', $product_for_parsing);
        $product_for_parsing = str_replace('мм', '', $product_for_parsing);
        preg_match(
                '/([0-9]+)?,?([0-9]+)?\*?([0-9]+)?,?([0-9]+)?\*?([0-9]+),?([0-9]+)?/',
                $product_for_parsing,
                $received_parameter
        );

        $received_parameter = trim($received_parameter[0]);

        $parameter = $standard_product_parameters->
                where('parameter', '==', $received_parameter)->
                where('parameter', '==', $received_parameter);
        echo ($parameter . ' ' . microtime(true) - $starttime);
    }
}
