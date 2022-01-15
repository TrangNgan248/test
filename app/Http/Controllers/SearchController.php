<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sach;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $danhmucsaches = Category::where('DMS_parentId', 0)->get();
        $saches = Sach::join('danhmucsaches', 'danhmucsaches.id', '=', 'S_DanhmucId')
                ->where('DMS_Tieude', 'like', '%'.$request->get('search').'%')
                ->orWhere('S_Ten', 'like', '%'.$request->get('search').'%')
                ->paginate(12);
        if(empty($saches[0])){
            return('Không tìm thấy kết quả!');
        }
        return view('product.category.list', compact('saches', 'danhmucsaches'));
    }
}
