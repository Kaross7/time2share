<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif',
            'product_description' => 'required|string',
            'product_category' => 'required|string',
            'loan_duration' => 'required|integer',
        ]);
    

        $product = new Product();
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_description');
        $product->category = $request->input('product_category');
        $product->loan_duration = $request->input('loan_duration');
    
  
        $product->user_id = auth()->id(); 
    
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('products', 'public');
            
            $product->image = $imagePath;
        }
        
        
        
        
        
        $product->save();
    
        return redirect()->route('leen-jouw-producten')->with('success', 'Product succesvol toegevoegd!');
    }
    
}
