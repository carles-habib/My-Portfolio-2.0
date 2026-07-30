<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function servicestore(Request $request)
    {
        $validated = $request->validate([
            'order' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brief' => 'required|string|max:255',
            'desc1' => 'required|string|max:255',
            'desc2' => 'required|string|max:255',
            'desc3' => 'required|string|max:255',
            'process' => 'required|string|max:255',
            'processdesc' => 'required|string|max:255',
            'objective1' => 'required|string|max:255',
            'objective2' => 'required|string|max:255',
            'objective3' => 'nullable|string|max:255',
            'objective4' => 'nullable|string|max:255',
            'objective5' => 'nullable|string|max:255',
            'objective6' => 'nullable|string|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('service', 'public');
            $validated['image'] = $imagePath;
        }

        // Create skill
        Services::create($validated);

        return redirect()->back()->with('success', 'Service added successfully.');
    }


    public function destroy($id)
    {
        $service = Services::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully.');
    }
}
