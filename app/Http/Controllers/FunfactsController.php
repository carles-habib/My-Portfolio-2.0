<?php

namespace App\Http\Controllers;

use App\Models\FunFact;
use Illuminate\Http\Request;

class FunfactsController extends Controller
{
    public function create()
    {
        return view('hero-section.funfact-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no' => 'required|string|max:255',
            'top' => 'required|string|max:255',
            'bottom' => 'required|string|max:255',
        ]);

        FunFact::create($validated);

        return redirect()->route('hero')->with('success', 'Funfact added successfully.');
    }

    public function edit(FunFact $funfact)
    {
        return view('hero-section.funfact-form', compact('funfact'));
    }

    public function update(Request $request, FunFact $funfact)
    {
        $validated = $request->validate([
            'no' => 'required|string|max:255',
            'top' => 'required|string|max:255',
            'bottom' => 'required|string|max:255',
        ]);

        $funfact->update($validated);

        return redirect()->route('hero')->with('success', 'Funfact updated successfully.');
    }

    public function destroy(FunFact $funfact)
    {
        $funfact->delete();

        return redirect()->route('hero')->with('success', 'Funfact deleted successfully.');
    }
}
