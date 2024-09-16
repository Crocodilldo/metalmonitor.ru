<?php

namespace App\Services\Admin;



use App\Models\UpdateLinks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UpdateLinksService

{
    public function showUpdateLinks(Request $request)
    {
        $list = UpdateLinks::where('shop_id', $request['shop_id'])->get();
        return ($list);
    }

    public function getcategories()
    {
        $categories = DB::table('categories')->get();
        return ($categories);
    }

    public function getShops()
    {
        $shops = DB::table('shops')->get();
        return ($shops);
    }

    public function addUpdateLink(Request $request)
    {
        $request->validate([
            'url' => 'required|url|unique:update_links,url',
            'category' => 'required'
        ]);

        DB::table('update_links')->insert([
            'category_id' => $request['category'],
            'url' => htmlspecialchars($request['url']),
            'shop_id' => $request['shop_id'],
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        Session::flash('flash message', 'URL успешно добавлен');

    }

    public function editUpdateLink(Request $request)
    {
        $request->validate(['url' => 'required|url']);

        DB::table('update_links')->where('id', '=', $request['update_link_id'])->update([
            'url' => htmlspecialchars($request['url']),
            'category_id' => $request['category'],
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        Session::flash('flash message', 'URL успешно изменен');
    }

    public function deleteUpdateLink(Request $request)
    {
        DB::table('update_links')->where('id', '=', $request['update_link_id'])->delete();
        Session::flash('flash message', 'URL успешно удален');
    }

    public function getAllUpdateLinks()
    {
        $list = UpdateLinks::orderBy('shop_id')->get();
        return ($list);
    }
}
