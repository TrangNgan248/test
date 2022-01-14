<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $adverts = Slider::latest()->get();
        $danhmucsaches = Category::where('DMS_parentId', 0)->get();
        $saches = Product::latest()->take(6)->get();
        $books = Product::latest()->take(12)->get();
        $categoryTabs = Category::where('DMS_parentId', 0)->take(6)->get();
        $productsRecommend = Product::latest('S_SoLanXem', 'desc')->take(12)->get();
        return view('home.home', compact('adverts', 'danhmucsaches', 'saches', 'productsRecommend', 'categoryTabs', 'books'));
    }
}
