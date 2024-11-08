<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UitleenmarktController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        
        return view('uitleenmarkt', compact('products'));
    }
}
