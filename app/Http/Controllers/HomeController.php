<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;
use stdClass;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);

        $dishes = DB::table('dishes')->paginate($perPage);

        $dishes->appends([
            'per_page' => $perPage
        ]);

        $meta = new stdClass();
        $meta->currentPage = $dishes->currentPage();
        $meta->totalItems = $dishes->total();
        $meta->itemsPerPage = $dishes->perPage();
        $meta->totalPages = $dishes->lastPage();

        $links = new stdClass();
        $links->prev = $dishes->previousPageUrl();
        $links->next = $dishes->nextPageUrl();
        $links->self = $dishes->url($dishes->currentPage());

        // TODO: how to redirect to self(current) page with params on load
        return view('home', [
            'data' => $dishes,
            'meta' => $meta,
            'links' => $links,
        ]);
    }
}
