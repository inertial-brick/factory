<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Support\Facades\DB;
use stdClass;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $category_id = $request->input('category_id', null);

        $meals = Meal::with('category')
            ->where('category_id', $category_id)
            ->paginate($perPage);

        $meals->appends([
            'per_page' => $perPage
        ]);

        $meta = new stdClass();
        $meta->currentPage = $meals->currentPage();
        $meta->totalItems = $meals->total();
        $meta->itemsPerPage = $meals->perPage();
        $meta->totalPages = $meals->lastPage();

        $links = new stdClass();
        $links->prev = $meals->previousPageUrl();
        $links->next = $meals->nextPageUrl();
        $links->self = $meals->url($meals->currentPage());

        $categories = Category::all();

        // TODO: how to redirect to self(current) page with params on load
        return view('home', [
            'data' => $meals,
            'meta' => $meta,
            'links' => $links,
            'categories' => $categories,
        ]);
    }
}
