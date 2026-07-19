<?php

namespace App\Http\Controllers;

use App\Models\skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillsController extends Controller
{
    public function skills()
    {
        $skills = skills::paginate(10);
        return view('skill-section.list',[
            'skills' => $skills
        ]);
    }

    public function create()
    {
        return view('skill-section.create');
    }

    public function skillstore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('skills', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['user_id'] = auth()->id();

        // Create skill
        Skills::create($validated);

        return redirect('/skill')->with('success', 'Skill added successfully.');
    }


    public function edit(skills $skills)
    {
        return view('skill-section.edit', compact('skills'));
    }


    public function update(Request  $request, skills $skills)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($skills->image) {
                Storage::disk('public')->delete($skills->image);
            }

            // Store new image
            $validated['image'] = $request->file('image')->store('skills', 'public');
        }

        // Update the skill
        $skills->update($validated);
        return redirect()->route('skill')
            ->with('success', 'Skill updated successfully');
    }


    public function destroy($id)
    {
        $skill = skills::findOrFail($id);
        $skill->delete();

        return redirect()->back()->with('success', 'Skill deleted successfully.');
    }




}
