<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function apiGetCategory(){
        $categories = Category::with('item')->get();
        return $categories;
    }

    public function apiCreateCategory(Request $request){
        Category::create([
            'name' => $request->name
        ]);
        return 'Created successfully';
    }

    public function apiUpdateCategory(Request $request, $id){

        $category = Category::find($id);

        $category->update([
            'name'=> $request->name,
        ]);

        return 'Updated successfully';
    }

    public function apiDeleteCategory($id){
        Category::destroy($id);
        return 'Deleted successfully';
    }

}
