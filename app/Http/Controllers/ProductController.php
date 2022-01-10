<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Product $product, Category $category, Comment $comment, Brand $brand)
    {   
        $categories = Category::all();
        $vehicle_type =  [ 'Motor','Auto', 'Terenac', 'Kamion', 'Autobus' ];
        $recomendedProducts = DB::table('products')->where('brand_id',  $product->brand->id)->take(4)->get();

        return view('product.index', compact('product', 'brand', 'category', 'categories', 'comment', 'recomendedProducts', 'vehicle_type'));
    }


    public function show()
    {
        $products = Product::all();

        return view('product.show', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $vehicle_type =  [ 'Motor','Auto', 'Terenac', 'Kamion', 'Autobus' ];

        return view('product.create', compact('categories', 'brands', 'vehicle_type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'vehicle_type'=>'',
            'image'=>['required','image'] ,
        ]);

        $data = $request->all();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('/storage/app/public/uploads'), $imageName);
        $data['image']= $imageName;

        Product::create($data);
        return redirect()->back()->with(['message' => 'Uspesno ste kreirali produkt!', 'alert' => 'alert-success']);
    }
    
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $categories = Category::all();
        $brands = Brand::all();
        $vehicle_type =  [ 'Motor','Auto', 'Terenac', 'Kamion', 'Autobus' ];

        return view('product.edit', compact('product','categories', 'brands', 'vehicle_type'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product->id);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);
        
        return view('product.update')->with(['message' => 'Uspesno ste azurilali produkt!', 'alert' => 'alert-success']);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with(['message' => 'Uspesno ste obrisali product!', 'alert' => 'alert-success']);
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produkt je uspesno dodat u korpi');
    }

    public function allProducts()
    {
        $products = Product::latest()->get();
        $categories = Category::all();

        return view('product.products', compact('products', 'categories'));
    }


   
    public function products_by_category(Category $category, Product $product)
    {
        $categories = Category::all();
        $productsByCategory = Product::where('category_id', $category->id)->latest()->get();
        return view('product.products_by_category', compact('productsByCategory', 'categories'));
    }

    public function products_by_brand(Brand $brand, Product $product)
    {
        $categories = Category::all();
        $productsByBrand = Product::where('brand_id', $brand->id)->latest()->get();
        return view('product.products_by_brands', compact('categories', 'productsByBrand', 'brand'));
    }

    public function products_by_search()
    {
        $categories = Category::all();

        $search_text = $_GET['query'];
        $products = Product::where('name', 'LIKE' , '%' .$search_text. '%')->with('category')->get();
        return view('product.productsBySearch', compact('products', 'categories'));
    }

    public function products_by_vehicle_type(Product $product)
    {
        $categories = Category::all();
        $productsByVehicleType = Product::where('vehicle_type', $product->vehicle_type)->latest()->get();
        return view('product.products_by_vehicle_type', compact('productsByVehicleType', 'categories'));
    }

  public function allProductsAdmin()
  {
      $products = Product::all();
      return view('product.allProductAdmin', compact('products'));
  }
}
