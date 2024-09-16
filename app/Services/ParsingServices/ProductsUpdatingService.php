<?php

namespace App\Services\ParsingServices;


use App\Models\UpdateLinks;
use App\Models\Shops;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Exception;

class ProductsUpdatingService
{
    public function productsUpdating(GetContentService $getContentService, ParsingService $parsingService, Request $request){
        $update_links = UpdateLinks::where('shop_id', $request['shop_id'])->get()->toArray();
                $starttime = microtime(true);
        foreach ($update_links as $update_link) {
            try{
            $category_id=$update_link['category_id'];
            $site_content = $getContentService->getSiteContent($update_link['url']);
            $parsingService->getProduct($site_content, $request, $category_id);
            
            }
            catch (Exception){
                continue;
             }
        
    }
    Shops::where('id', $request['shop_id'])->update(['updated_at' =>Carbon::now()->toDateTimeString()]);
    echo ('Магазин "' . $request['shop_name'] . '" обновлен за ' . microtime(true) - $starttime);
    }
}
