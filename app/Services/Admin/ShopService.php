<?php

namespace App\Services\Admin;


use App\Actions\CreateSlugAction;
use App\Models\Shops;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShopService

{
    public function showShops()
    {
        $list = Shops::get()->all();
        return ($list);
    }

    public function addShop(Request $request, CreateSlugAction $slugAction)
    {
        $request->validate([
            'name' => 'required|unique:shops,name',
            'url' => 'required|unique:shops,url',
            'logo' => 'image']);

            $slug = $slugAction->handle($request['name']);

        if ($request->file('logo') !== null)
            $logo = $request->file('logo')->storeAs('logo', $slug.'.webp');
        else $logo = 'no_logo';

        DB::table('shops')->insert([
            'name' => htmlspecialchars($request['name']),
            'url' => htmlspecialchars($request['url']),
            'slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function deleteShop(Request $request)
    {       //TODO : Casscade delete!!!
        if (isset($request['confirm']) && $request['confirm'] == 'удалить') {
            DB::table('shops')->where('id', '=', $request['shop_id'])->delete();
            Session::flash('flash message', 'Магазин успешно удален');
        } else
            Session::flash('flash message', 'Магазин не удален');
    }

    public function editShop(Request $request, CreateSlugAction $slugAction)
    {
        $request->validate(['new_logo' => 'image']);
        $slug = $slugAction->handle($request['name']);
        Storage::disk('local')->delete('logo/'.$slug.'.webp');
        if ($request->file('new_logo') !== null)
            $logo = $request->file('new_logo')->storeAs('logo', $slug.'.webp');

        DB::table('shops')->where('name', $request['shop_old_name'])->update([
            'name' => htmlspecialchars($request['name']),
            'slug' => $slug,
            'url' => htmlspecialchars($request['url'])
        ]);
        Session::flash('flash message', 'Магазин "' . $request['name'] . '" успешно обновлен');
    }

}
