<?php

namespace App\Services\Admin;


use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriesService

{
    public function showCategories()
    {
        $list = Categories::get()->all();
        return ($list);
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        DB::table('categories')->insert([
            'name' => htmlspecialchars($request['name']),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function deleteCategory(Request $request)
    {
        DB::table('categories')->where('id', '=', $request['category_id'])->delete();
        Session::flash('flash message', 'Категория успешно удалена');
    }

    public function editCategory(Request $request)
    {
        $request->validate(['new_img' => 'image']);

        if ($request->file('new_img') == null)
            $img = $request['category_old_img'];

        else {
            $img = $request->file('new_img')->store('public/categories_img');
            $img = substr($img, 7);
        }

        DB::table('categories')->where('id', '=', $request['category_id'])->update([
            'name' => htmlspecialchars($request['name']),
            'img' => $img,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        Session::flash('flash message', 'Категория "' . $request['name'] . '" успешно обновлена');
    }
}
