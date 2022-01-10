<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
      
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => ['required','image']
        ]);

        $data = $request->all();

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('/storage/app/public/uploads'), $imageName);

        $data['image'] = $imageName;

        Category::create($data);

        return redirect()->back()->with(['message' => 'Uspesno ste kreirali kategoriju!', 'alert' => 'alert-success']);
    }
    public function show()
    {
        $categories = Category::all();
        return view('categories.show', compact('categories'));
    }

    public function destroy( Category $category)
    {
        $category->delete();
        return redirect()->back()->with(['message' => 'Uspesno ste obrisali kategoriju!', 'alert' => 'alert-success']);
    }
}