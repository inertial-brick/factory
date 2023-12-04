<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Http\Resources\TagCollection;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return new TagCollection(Tag::paginate());
    }
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }
}
