<?php

namespace App\Http\Controllers;

use App\Actions\FiltersActions\CategoryFilterAction;
use App\Actions\FiltersActions\ParametersFilterAction;
use App\Actions\FiltersActions\PriceFilterAction;
use App\Actions\FiltersActions\ShopFilterAction;
use App\Services\FiltrationService;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function search(SearchService $searchService, Request $request)
    {
        $search_result = $searchService->search($request);
        if ($search_result->isEmpty()) {
            return view('search.noResult');
        }
        Session::put('search_result', $search_result);
        $searchService->getFiltersFromSearchResults($search_result);
        $filters_list = $searchService->getFiltersFromSearchResults($search_result);
        Session::put('filters_list', $filters_list);

        return view('search.SearchResult', [
            'filters_list' => $filters_list,
            'search_result' => $search_result
        ]);
    }

    public function applyFilters(
        FiltrationService    $filtrationService,
        Request              $request,
        CategoryFilterAction $categoryFilterAction,
        ParametersFilterAction  $parametersFilterAction,
        ShopFilterAction     $shopFilterAction,
        PriceFilterAction    $priceFilterAction
    ) {
        return $filtrationService->applyFilters(
            $request,
            $categoryFilterAction,
            $parametersFilterAction,
            $shopFilterAction,
            $priceFilterAction
        );
    }

    public function resetFilters(FiltrationService $filtrationService)
    {
        return $filtrationService->resetFilters();
    }
}
