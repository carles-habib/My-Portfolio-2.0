<?php

namespace App\Http\Controllers;

use App\Models\FunFact;
use Illuminate\Http\Request;

class FunfactsController extends Controller
{
    public function funfactstore(Request $request)
       {
           $validated = $request->validate([
               'no' => 'required|string|max:255',
               'top' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               'bottom' => 'required|string|max:255',

           ]);

           // Create Funfact
           Funfacts::create($validated);

           return redirect()->back()->with('success', 'Service added successfully.');
       }

}
