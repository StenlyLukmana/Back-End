<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{

    public function catalogue(){
        $items = Item::all();
        return view('view', [
            'title' => 'Catalogue',
            'items' => $items,
        ]);
    }

    public function getCreatePage(){
        $categories = Category::all();
        return view('create', [
            'title' => 'Create Item',
            'categories' => $categories
        ]);
    }
    
    public function createItem(ItemRequest $request){
        
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->name.'-'.$request->category_id.'.'.$extension;
        $request->file('image')->storeAs('/public/item_images', $fileName);

        Item::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'quantity'=> $request->quantity,
            'image' => $fileName,
            'category_id' => $request->category_id,
        ]);

        return redirect(route('catalogue'));
    }

    public function getItemId($id){
        $categories = Category::all();
        $item = Item::find($id);
        return view('update', [
            'title' => 'Update Item',
            'item' => $item, 
            'categories' => $categories
        ]);
    }

    public function updateItem(ItemRequest $request, $id){

        $item = Item::find($id);

        $item->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'quantity'=> $request->quantity,
            'category_id' => $request->category_id,
        ]);

        return redirect(route('catalogue'));
    }


    public function deleteItem($id){
        Item::destroy($id);
        return redirect(route('catalogue'));
    }
}
