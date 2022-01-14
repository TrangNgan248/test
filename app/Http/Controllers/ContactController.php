<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tintuc;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {

        $danhmucsaches = Category::where('DMS_parentId', 0)->get();
        $tintucs = Tintuc::latest()->paginate(3);
        return view('contact.contact', compact('danhmucsaches', 'tintucs'));
    }
}
