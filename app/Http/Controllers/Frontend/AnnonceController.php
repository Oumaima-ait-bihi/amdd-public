<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Annonce;  // Assuming Annonce is the model you're working with
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function index()
    {
        // Fetch paginated data for annonces
        $annonces = Annonce::paginate(5);  // You can change the pagination limit as needed

        // Return the view with the annonces data
        return view('frontend.annonces', compact('annonces'));
    }

    public function show($id)
    {
        // Fetch a specific annonce by its ID
        $annonce = Annonce::findOrFail($id);

        // Return the details page for this annonce
        return view('frontend.annonce-details', compact('annonce'));
    }
}

