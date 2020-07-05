<?php

namespace App\Http\Controllers\Store;

use App\Store\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index() {
        $data = Product::with(['transaction'])
            ->latest()
            ->get();
        return response()->json($data);
    }

    public function store(Request $request) {
        $data = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return response()->json($data);
    }

    public function show($id) {
        $data = Product::with(['transaction'])->find($id);

        if (!$data) {
            return response()->json("Can't find product");
        }

        return response()->json($data);
    }

    public function update(Request $request, $id) {
        $data = Product::find($id);

        if (!$data) {
            return response()->json("Can't find product");
        }

        $data->name = $request->name;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->save();
        return response()->json($data);
    }

    public function delete($id) {
        $data = Product::find($id);

        if (!$data) {
            return response()->json("Can't find product");
        }

        $name = $data->name;
        $data->delete();
        return response()->json('success to delete ' . $name);
    }
}
