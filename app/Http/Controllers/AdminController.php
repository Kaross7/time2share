<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product; // Dit is correct, omdat producten in plaats van advertenties zijn
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Controleer of de gebruiker admin is
        if (auth()->user() && auth()->user()->is_admin != 1) {
            // Als de gebruiker geen admin is, stuur ze terug naar de homepagina of een andere route
            return redirect('/')->with('error', 'Je hebt geen toegang tot dit gedeelte.');
        }

        // Haal alle gebruikers en producten op
        $users = User::all();
        $products = Product::all();
        
        // Retourneer de view met de benodigde data
        return view('admin.dashboard', compact('users', 'products'));
    }

    // Blokkeer een gebruiker
    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_blocked = true;
        $user->save();

        return redirect()->route('admin.dashboard');
    }

    // Deblokkeer een gebruiker
    public function unblockUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_blocked = false;
        $user->save();

        return redirect()->route('admin.dashboard');
    }

    // Verwijder een product
    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Product succesvol verwijderd!');
    }
}
