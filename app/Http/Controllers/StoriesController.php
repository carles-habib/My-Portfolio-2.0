<?php

namespace App\Http\Controllers;

use App\Models\Stories;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function storestory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'coname' => 'required|string|max:255',
            'jobtitle' => 'required|string|max:255',
        ]);



        // Create skill
        Stories::create($validated);

        return redirect('/stories')->with('success', 'Story added successfully.');
    }

    public function destroy($id)
    {
        $story = Stories::findOrFail($id);
        $story->delete();

        return redirect()->back()->with('success', 'Story deleted successfully.');
    }
}
