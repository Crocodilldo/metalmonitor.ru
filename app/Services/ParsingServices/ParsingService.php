<?php

namespace App\Services\ParsingServices;

use App\Models\PhpQuerySelectors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\StandardProductParameters;
use phpQuery;


class ParsingService
{

    public function getProduct($site_content, Request $request, $category_id)
    {

        $request['shop_id'] = '3';        //TODO : Delete test shop_id

        $selectors = PhpQuerySelectors::where('shop_id', $request['shop_id'])->get()->toArray();

        //Преобразование результата в объект phpQuery
        $site_content = phpQuery::newDocument($site_content);

        //Получение информации о продукте
        $str = $site_content->find($selectors['0']['product_information']);
        foreach ($str as $row) {
            $str = trim(pq($row)->text());
            $products_information[] = $str;
        }

        //Присвоение параметров продукта
        $standard_product_parameters = StandardProductParameters::get();
        foreach($products_information as $product_for_parsing){
            $product_for_parsing = str_replace(['х', 'x', 'х', '/'], '*', $product_for_parsing);
            $product_for_parsing = str_replace('мм', '', $product_for_parsing);
            $product_for_parsing = str_replace('.', ',', $product_for_parsing);
            preg_match(
                    '/([0-9]+)?,?([0-9]+)?\*?([0-9]+)?,?([0-9]+)?\*?([0-9]+),?([0-9]+)?/',
                    $product_for_parsing,
                    $received_parameter
            );
        $received_parameter = trim($received_parameter[0],' \,');
        $product_parameter = $standard_product_parameters->
                where('category_id', '==', $category_id)->
                where('parameter', '==', $received_parameter)->first();
                if (isset($product_parameter['parameter']))
                     $products_parameters[]= $product_parameter['parameter'];
                else $products_parameters[]= '-';
        }

        //получение цены
        $str = $site_content->find($selectors['0']['price']);
        foreach ($str as $row)

                if ($row !==NULL)
                    $prices[] = (float)str_replace(' ', '', pq($row)->text());
                else $prices[] = '-';

        //получение ссылки на товар
        $str = $site_content->find($selectors['0']['url']);
        foreach ($str as $row)
            $product_url[] = pq($row)->attr('href');

        phpQuery::unloadDocuments();

        //создание массива товаров для добавления в БД
        for ($i = 0; $i < count($product_url); $i++) {
            $product[$i] = [
                'name' => $products_information[$i],
                'category_id' => $category_id,
                'shop_id' => $request['shop_id'],
                'parameter' => $products_parameters[$i],
                'price' => $prices[$i],
                'url' => $product_url[$i],
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];
        }

        // //запись результатов в БД
        foreach ($product as $pr) {
            Products::updateOrCreate(['url' => $pr['url']], $pr
            );
        }
        
        echo '<pre>';
        var_dump($product);
        echo '</pre>';
    }
}
