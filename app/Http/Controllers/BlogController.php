<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tintuc;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $danhmucsaches = Category::where('DMS_parentId', 0)->get();
        $tintucs = Tintuc::latest()->paginate(3);
        return view('Blog.blog', compact('danhmucsaches', 'tintucs'));
    }
}
