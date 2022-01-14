<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function index(Category $id){
        $danhmucsaches = Category::where('DMS_parentId','=', 0)->get();
        $saches = Product::join('danhmucsaches', 'danhmucsaches.id', '=', 'S_DanhmucId')
            ->where('S_DanhmucId', '=',$id->id)
            ->orWhere('DMS_parentId', '=', $id->id)
            ->paginate(12);
        return view('product.category.list', compact('danhmucsaches', 'saches', 'id'));
    }
}
