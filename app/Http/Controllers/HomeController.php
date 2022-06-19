<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Comment;
use App\Models\SoldProduct;

class HomeController extends Controller
{
    public function index(Product $product, SoldProduct $product_id)
    {
        $comments = Comment::latest()->paginate(3);
        $categories = Category::all();
        $products = DB::table('products')->orderBy('created_at', 'DESC')->paginate(4);
        
        $popularProducts = Product::get()->sortByDesc(
            function ($p) {
            return $p->solds->sum('qty');
        })->take(4);
        
            return view('home.index', compact('products', 'categories', 'comments', 'popularProducts', 'product_id'));  
    }
}
