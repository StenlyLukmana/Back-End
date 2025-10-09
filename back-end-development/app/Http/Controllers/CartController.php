<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCart(){
        $items = Item::all();
        $userID = Auth::user()->id;
        $carts = Cart::where('user_id', $userID)->get();
        return view('cart', [
            'title' => 'Cart',
            'items' => $items, 
            'carts' => $carts
        ]);
    }

    public function cartStore(Request $request){

        $item = Item::findOrfail($request->item_id);

        $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required|integer|min:1|max:'.$item->quantity,
        ]);

        $quantity = $request->input('quantity');
        $subtotal = $item->price * $quantity;

        if($quantity == 0){
            Cart::where('user_id', $request->user_id)->where('item_id', $request->item_id)->delete();
        }
        else{
            Cart::create([
                'user_id' => $request->user_id,
                'item_id' => $request->item_id,
                'quantity' => $request->quantity,
                'subtotal' => $subtotal,
            ]);
        }

        return redirect(route('catalogue'));
    }

    public function removeItem($id){
        Cart::destroy($id);
        return redirect(route('getCart'));
    }

}
