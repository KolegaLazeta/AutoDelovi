<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        
    }

    public function show()
    {
        $purchases = Purchase::latest()->paginate(10);
        return view('purchase.show', compact('purchases'));
    }

    public function create(Product $product)
    {
        $categories = Category::all();
        return view('purchase.index', compact('product', 'categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'address1'=>'required',
            'address2'=>'',
            'city'=>'required',
            'zip'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

       
       $purchase = auth()->user()->purchase()->create($request->all());

        foreach(auth()->user()->cart as $product)
        {
            $purchase->products()->create([
                'product_id'=>$product->product_id,
                'quantity'=>$product->quantity,
                'price' => $product->product->price,
                'total_amount' => $product->total]);
            $product->delete();
        }
       
        
        return redirect()->back()->with(['message' => 'Uspesno ste narucili produkt!', 'alert' => 'alert-success']);
    }
    public function purchaseInfo(Purchase $purchase, User $user)
    {
        return view('purchase.purchase_info', compact('purchase', 'user'));
    }

    public function destroy(Purchase $purchase) 
    {
        $purchase->delete();
        return redirect()->back()->with(['message' => 'Uspesno ste obrisali porudzbinu!', 'alert' => 'alert-success']);
        
    }
}
