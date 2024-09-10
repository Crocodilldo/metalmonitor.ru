<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ParsingServices\GetContentService;
use App\Services\ParsingServices\ParsingService;
use App\Services\ParsingServices\ProductsUpdatingService;
use Illuminate\Http\Request;


class UpdateProductsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        ProductsUpdatingService $productsUpdatingService,
        GetContentService       $getContentService,
        ParsingService          $parsingService,
        Request                 $request
    ) {
        $productsUpdatingService->productsUpdating($getContentService, $parsingService, $request);
    }
}
