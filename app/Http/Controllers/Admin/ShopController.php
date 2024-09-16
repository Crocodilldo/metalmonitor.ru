<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateSlugAction;
use App\Http\Controllers\Controller;
use App\Services\Admin\ShopService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index(ShopService $shopservice)
    {
        $list = $shopservice->showShops();
        return view('admin.shops', ['list' => $list]);

    }

    public function addShopView()
    {
        return view('admin.addShop');

    }

    public function addShop(Request $request, ShopService $shopservice, CreateSlugAction $slugAction)
    {

        $shopservice->addShop($request, $slugAction);
        return redirect(route('shops'))->with(Session::flash('flash message', 'Магазин успешно добавлен'));
    }

    public function confirmDeleteShop(Request $request)
    {
        return view('admin.confirmDeleteShop', ['shop_name' => $request->get('shop_name')]);
    }

    public function deleteShop(Request $request, ShopService $shopservice, CreateSlugAction $slugAction)
    {
        $shopservice->deleteShop($request, $slugAction);
        return redirect(route('shops'));
    }

    public function editShopView(Request $request)
    {
        return view('admin.editShop', [
            'shop_name' => $request->get('shop_name'),
            'shop_url' => $request['shop_url'],
            'shop_logo' => $request['shop_logo'],
        ]);
    }

    public function editShop(Request $request, ShopService $shopservice, CreateSlugAction $slugAction)
    {
        $shopservice->editShop($request, $slugAction);
        return redirect(route('shops'));

    }
}
