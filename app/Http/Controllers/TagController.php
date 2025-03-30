<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Tag;

class TagController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        return response()->json(Tag::all());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:tags,name']);
        $tag = Tag::create(['name' => $request->name]);

        return response()->json(['message' => 'Tag created successfully', 'tag' => $tag]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['message' => 'Tag deleted successfully']);
    }
}