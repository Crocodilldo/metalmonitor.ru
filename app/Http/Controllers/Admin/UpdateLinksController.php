<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UpdateLinksService;
use Illuminate\Http\Request;

class UpdateLinksController extends Controller
{
    public function index(Request $request, UpdateLinksService $links)
    {
        $list = $links->showUpdateLinks($request);
        return view('admin.updateLinks', ['list' => $list,
            'shop_id' => $request['shop_id'],
            'shop_name' => $request['shop_name'],
            'category' => $request['category']
        ]);
    }

    public function addUpdateLinkView(Request $request, UpdateLinksService $links)
    {
        $categories = $links->getCategories();
        return view('admin.addUpdateLink', ['shop_name' => $request['shop_name'],
            'categories' => $categories]);
    }

    public function addUpdateLink(Request $request, UpdateLinksService $links)
    {
        $links->addUpdateLink($request);
        return redirect(route('shops'));

    }

    public function editUpdateLinkView(Request $request, UpdateLinksService $links)
    {
        $categories = $links->getCategories();
        return view('admin.editUpdateLink', ['update_link_id' => $request['update_link_id'],
            'update_link_category' => $request['update_link_category'],
            'update_link_url' => $request['update_link_url'],
            'categories' => $categories
        ]);
    }

    public function editUpdateLink(Request $request, UpdateLinksService $links)
    {
        $links->editUpdateLink($request);
        return redirect(route('shops'));
    }


    public function deleteUpdateLink(Request $request, UpdateLinksService $links)
    {
        $links->deleteUpdateLink($request);
        return back();
    }

    public function showAllUpdateLinks(Request $request, UpdateLinksService $links)
    {
        $list = $links->getAllUpdateLinks();
        $categories = $links->getCategories();
        $shops = $links->getShops();
        return view('admin.showAllUpdateLinks', ['list' => $list,
            'categories' => $categories,
            'shops' => $shops
        ]);
    }
}
