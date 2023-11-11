<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Database\Query\Builder;
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

        $meals = Meal::with("category")
            ->orWhere(function (Builder $query) use ($category_id) {
                if ($category_id == 'with-category') {
                    $query->whereNotNull("category_id");

                    return;
                }

                if ($category_id == 'no-category') {
                    $query->whereNull("category_id");

                    return;
                }

                if ($category_id) {
                    $query->where("category_id", $category_id);

                    return;
                }
            })
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

        return view('home', [
            'data' => $meals,
            'meta' => $meta,
            'links' => $links,
            'categories' => $categories,
        ]);
    }
}
