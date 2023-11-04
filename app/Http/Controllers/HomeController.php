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

        if (!$request->has('per_page')) {
            $url = url()->current();

            $query = $request->query();
            $query['per_page'] = $perPage;

            $url .= '?' . http_build_query($query);

            return redirect($url);
        }

        $dishes = DB::table('dishes')->paginate($perPage);

        $meta = new stdClass();
        $meta->itemsPerPage = $perPage;

        return view('home', [
            'data' => $dishes,
            'meta' => $meta
        ]);
    }
}
