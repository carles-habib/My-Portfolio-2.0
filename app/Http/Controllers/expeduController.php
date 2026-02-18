<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;

class expeduController extends Controller
{
    public function expstore(Request $request)
    {
        $validated = $request->validate([
            'startDate' => 'required|string|max:255',
            'endDate' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'place' => 'required|string|max:255',
        ]);



        // Create skill
        Experience::create($validated);

        return redirect('/exp-edu.list')->with('success', 'Experience added successfully.');
    }
    public function edustore(Request $request)
    {
        $validated = $request->validate([
            'startDate' => 'required|string|max:255',
            'endDate' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'place' => 'required|string|max:255',
        ]);



        // Create skill
        Education::create($validated);

        return redirect('/exp-edu.list')->with('success', 'Education added successfully.');
    }

    public function expdestroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->back()->with('success', 'Experience deleted successfully.');
    }
    public function edudestroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->back()->with('success', 'Education deleted successfully.');
    }
}
