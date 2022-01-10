<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    public function index(Bradn $brands)
    {
        return view('brand.index', compact('bradns'));
    }
    public function create()
    {
        return view('brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);

        $data = $request->all();

        $imageName =time() . '.' . $request->image->extension();
        $request->image->move(public_path('/storage/app/public/uploads'));
        $data['image'] = $imageName;

        Brand::create($data);

        return redirect()->back()->with(['message' => 'Uspesno ste dodali brend!', 'alert' => 'alert-success']);
    }

    public function show()
    {
        $brands = Brand::all();
        return view('brand.show', compact('brands'));
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->back()->with(['message' => 'Uspesno ste obrisali brend!', 'alert' => 'alert-success']);
    }
}
