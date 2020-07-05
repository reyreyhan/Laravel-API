<?php

namespace App\Http\Controllers\Store;

use App\Store\Product;
use App\Store\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function store(Request $request, $product_id) {
        $product = Product::with(['transaction'])
        ->find($product_id);

        if (!$product_id) {
            return response()->json("Can't find product");
        }

        $transactionCount = $product->transaction->count();

        $total = 0;
        for ($i = 0; $i < $transactionCount; $i++) {
            $total = $total + $product->transaction[$i]->piece;
        }
        $stock = $product->stock;

        if ($stock < $transactionCount || $stock < $transactionCount + $request->piece) {
            return response()->json("This product is out of stock");
        }

        $total = $request->piece * $product->price;

        $data = Transaction::create([
            'product_id' => $product_id,
            'piece' => $request->piece,
            'total' => $total
        ]);

        return response()->json($data);
    }

    public function index() {
        $data = Transaction::with(['product'])
            ->get();

        return response()->json($data);
    }
}
