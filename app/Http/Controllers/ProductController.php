<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function all(){
        $products = Product::all();
        return response()->json([
            'content' => $products
        ]);
    }
    public function index($id){
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'message' => 'Товар не существует',
            ],404);
        } else {
            return response()->json([
                'content' => $product
            ]);
        }
    }
    public function store(ProductRequest $request){
        $product = Product::create($request->all());

        return response()->json([
            'content' => [
                'id' => $product->id,
                'message' => 'Товар добавлен'
            ]
        ]);
    }
    public function update($id,ProductEditRequest $request){
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'message' => 'Товара не существует'
            ]);
        }
        $product->update($request->all());

        return response()->json([
            'content' => [
                'id' => $product->id,
                'message' => 'Данные обновлены'
            ]
        ], 200);

    }
    public function destroy($id){
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'message' => 'Товара не существует',
            ],404);
        }
        $product->delete();
        return response()->json([
            'content' => [
                'message' => 'Товар удален'
            ]
        ]);
    }
}
