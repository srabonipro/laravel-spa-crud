<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // all categories
    public function index()
    {
        $categories = Category::all()->toArray();
        return array_reverse($categories);
    }

    // add category
    public function add(Request $request)
    {
        $category = new Category([
            'name' => $request->input('name')
        ]);
        $category->save();

        return response()->json('The category successfully added');
    }

    // edit category
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    // update category
    public function update($id, Request $request)
    {
        $category = Category::find($id);
        $category->update($request->all());

        return response()->json('The category successfully updated');
    }

    // delete category
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return response()->json('The category successfully deleted');
    }
}
