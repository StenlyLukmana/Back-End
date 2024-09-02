<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InvoiceRequest;

class InvoiceController extends Controller
{
    
    public function checkoutPage(){
        $items = Item::all();
        $userID = Auth::user()->id;
        $carts = Cart::where('user_id', $userID)->get();
        return view('checkout', [
            'title' => 'Checkout Page',
            'items' => $items, 
            'carts' => $carts
        ]);
    }

    public function createInvoice(InvoiceRequest $request){

        $dateTime = now()->format('Ymd-His');
        $invoiceID = 'INV-' . $dateTime . '-' . $request->user_id;

        $items = Item::all();
        $userID = Auth::user()->id;
        $carts = Cart::where('user_id', $userID)->get();

        $invoice = Invoice::create([
            'invoice_id' => $invoiceID,
            'user_id' => $request->user_id,
            'address' => $request->address,
            'postal' => $request->postal,
            'total' => $request->total,
        ]);

        $userID = Auth::user()->id;
        $carts = Cart::where('user_id', $userID)->get();

        foreach($carts as $cart){
            $item = Item::find($cart->item_id);

            if($item->quantity >= $cart->quantity){
                $item->decrement('quantity', $cart->quantity);
            }
            else{
                return back()->with('error','Insufficient stock for amount ordered');
            }
        }

        return redirect(route('orders'))->with('success', 'Invoice created successfully!');
    }


    public function orders(){
        $userID = Auth::user()->id;
        $invoices = Invoice::where('user_id', $userID)->get();
        return view('orders', [
            'title' => 'Ongoing Orders',
            'invoices' => $invoices,
        ]);
    }

}
