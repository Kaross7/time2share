<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // Haal de producten op die bij de ingelogde gebruiker horen
        $products = Product::where('user_id', auth()->id())->get();

        // Geef de producten door naar de view
        return view('dashboard', compact('products'));
    }
}
