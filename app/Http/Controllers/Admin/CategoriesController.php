<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\CategoriesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{

    public function index(CategoriesService $categories)
    {
        $list = $categories->showCategories();
        return view('admin.categories', ['list' => $list]);
    }

    public function addCategoryView()
    {
        return view('admin.addCategory');
    }

    public function addCategory(Request $request, CategoriesService $categories)
    {
        $categories->addCategory($request);
        return redirect(route('categories'))->with(Session::flash('flash message', 'Категория успешно добавлена'));
    }

    public function deleteCategory(Request $request, CategoriesService $categories)
    {
        $categories->deleteCategory($request);
        return back();
    }

    public function editCategoryView(Request $request)
    {
        return view('admin.editCategory', [
            'category_name' => $request['category_name'],
            'category_img' => $request['category_img']
        ]);
    }

    public function editCategory(Request $request, CategoriesService $categories)
    {
        $categories->editCategory($request);
        return redirect(route('categories'));

    }
}
