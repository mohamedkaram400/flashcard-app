<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\ApiResponseTrait;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DB::table('categories')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject'   => 'required|string'
        ]);

        $category = Category::create(['subject' => $request->subject]);

        return $this->ApiResponse('Category Created Successfull', 201, $category);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subject'   => 'required|string'
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->subject);
        
        return $this->ApiResponse('Category Deleted Successfull', 200, $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();

        return $this->ApiResponse('Category Deleted Successfull', 200);
    }
}
