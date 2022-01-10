<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class AdminController extends Controller
{
    public function index(Purchase $purchase)
    {
        return view('admin.index', compact('purchase'));
    }
}
