<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $product = Product::create([
            "name" => $request->input('title'),
            "description" => $request->input('description'),
            "price" => $request->input('price'),
        ]);


        // thumbnail
        if ($request->has('thumbnail')) {
            $product->addMedia(storage_path('tmp/uploads/' . $request->input('thumbnail')))->toMediaCollection('thumbnail');
        }


        // move media
        if ($request->has('gallery')) {
            foreach ($request->input('gallery', []) as $file) {
                $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        $response = [
            'status' => 'success',
            'message' => 'Product added'
        ];
        return \response()->json($response);
    }
}
