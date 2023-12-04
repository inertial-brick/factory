<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return new CategoryCollection(Category::paginate());
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
}
