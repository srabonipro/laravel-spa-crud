<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        // ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->file('file')) {

            // // Single File Upload
            // $file = $request->file('file');
            // $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            // $path = $file->storeAs('uploads', $fileName);
            // if ($path) {
            //     return response()->json(['message' => 'file uploaded'], 200);
            // }

            // Multiple File Upload
            $files = $request->file('file');
            if (!is_array($files)) {
                $files = [$files];
            }

            for ($i = 0; $i < count($files); $i++) {
                $file = $files[$i];
                $fileName = time() . uniqid() . '.' . $file->getClientOriginalExtension();
                Storage::putFileAs('public/gallery', $file, $fileName);
                Gallery::create([
                    'name' => $fileName,
                    'product_id' => $product->id,
                ]);
                return response()->json('Product Uploaded Successfully!');
            }
        } else {
            return response()->json('Something went wrong!');
        }
    }
}
