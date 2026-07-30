<?php

namespace App\Http\Controllers;

use App\Models\Image;
//use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{


    public function create()
    {
        return view('hero-section.uploadimage');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['image_path'] = $request->file('image_path')->store('portfolio', 'public');

        Image::create($validated);
        return redirect()->route('hero')
            ->with('success', 'Image uploaded successfully.');
    }

    public function show(Image $image)
    {
        return view('hero-section.uploadimage', compact('image'));
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return redirect()->route('hero')
            ->with('success', 'Image deleted successfully.');
    }

}
