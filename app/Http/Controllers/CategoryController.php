<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // all category
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    // add category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        // $category = Category::create([
        //     'name' => $request->name
        // ]);

        $category = Category::create($request->all());

        if ($category) {
            return response()->json('The category successfully added');
        } else {
            return response()->json('Something went wrong!!');
        }
    }

    // show category
    public function show(Category $category)
    {
        return response()->json($category);
    }

    // update category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->name;
        $updated = $category->update();

        if ($updated) {
            return response()->json('The category successfully updated');
        } else {
            return response()->json('Something went wrong!!');
        }
    }

    // delete category
    public function destroy(Category $category)
    {
        $deleted = $category->delete();

        if ($deleted) {
            return response()->json('The category successfully deleted');
        } else {
            return response()->json('Something went wrong!!');
        }
    }
}
