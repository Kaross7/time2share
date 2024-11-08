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
    
        // Zet de status van het product op 'beschikbaar' bij het aanmaken
        $product->status = 'beschikbaar';
    
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('products', 'public');
            $product->image = $imagePath;
        }
    
        // Sla het product op
        $product->save();
    
        // Redirect naar de pagina voor het beheren van producten met een succesmelding
        return redirect()->route('leen-jouw-producten')->with('success', 'Product succesvol toegevoegd!');
    }
    
    
    public function destroy($id)
{
    $product = Product::findOrFail($id);

    if ($product->user_id !== auth()->id()) {
        return redirect()->route('leen-jouw-producten')->with('error', 'Je hebt geen toestemming om dit product te verwijderen.');
    }

    if ($product->image) {
        \Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return redirect()->route('dashboard')->with('success', 'Product succesvol verwijderd!');
}


public function lendProduct($productId)
{
    $product = Product::findOrFail($productId);

    if ($product->status == 'beschikbaar') {
        $product->status = 'uitgeleend';
        $product->borrower_id = auth()->id(); 
        $product->end_date = now()->addDays($product->loan_duration);
        $product->save();

        return redirect()->route('uitleenmarkt')->with('success', 'Je hebt het product succesvol geleend!');
    }

    return redirect()->route('uitleenmarkt')->with('error', 'Dit product is niet beschikbaar.');
}

public function geleendeProducten()
{
    $products = Product::where('borrower_id', auth()->id())->get();

    return view('geleende-producten', compact('products'));
}

public function teruggeven(Product $product)
{
    if ($product->borrower_id == auth()->id()) {
        $product->status = 'teruggegeven_lener';  
        $product->borrower_id = null; 
        $product->end_date = null; 
        $product->save();

        return redirect()->route('dashboard')->with('success', 'Je hebt het product teruggegeven. Wacht op de bevestiging van de uitlener.');
    }

    return redirect()->route('dashboard')->with('error', 'Je kunt dit product niet teruggeven.');
}


public function bevestigTeruggeven($id)
{
    $product = Product::findOrFail($id);

   
    if ($product->user_id !== auth()->id()) {
        return redirect()->route('dashboard')->with('error', 'Je bent niet de eigenaar van dit product.');
    }

   
    if ($product->status !== 'teruggegeven_lener') {
        return redirect()->route('dashboard')->with('error', 'Dit product is niet gemarkeerd als teruggegeven door de lener.');
    }

    
    $product->status = 'beschikbaar';  
    $product->borrower_id = null;     
    $product->end_date = null;         
    $product->save();

    return redirect()->route('dashboard')->with('success', 'Het product is teruggegeven en is nu weer beschikbaar voor anderen.');
}



}
