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
    public function index(Product $product)
    {
        $comments = Comment::latest()->paginate(3);
        $categories = Category::all();
        $products = DB::table('products')->orderBy('created_at', 'DESC')->paginate(4);


        $popularProducts = DB::table('sold_products')->select()->where('product_id')->distinct()->get();
        
        dd( view('home.index', compact('products', 'categories', 'comments', 'popularProducts')));
    }
}
