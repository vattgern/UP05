<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Basket;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BasketResource;
use App\Models\Product;

class BasketController extends Controller
{
    public function all(){
        $user = User::where('token', '!=', null)->first();
        return response()->json([
            'content' => BasketResource::collection(Basket::all()->where('user_id', $user->id))
        ]);
    }
    public function store($product_id){
        $product = Product::find($product_id);
        dd($product);
        $user = User::where('token', '!=', null)->first();
        Basket::create([
            'user_id' => $user->id,
            'product_id' => $product_id
        ]);
        return response()->json([
            'message' => 'Товар в корзине'
        ]);
    }
    public function destroy($id){
        $product = Basket::find($id);
        $product->delete();
        return response()->json([
            'content' => [
                'message' => 'Позиция удалена из корзины'
            ]
        ]);
    }
}
