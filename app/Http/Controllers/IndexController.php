<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        if (Cache::has('categories'))
        $categories=Cache::get('categories');
    else
    {
        $categories = Categories::get();
        Cache::put('categories', $categories);
    }
    return view('welcome', ['categories'=>$categories]);
    }
}
