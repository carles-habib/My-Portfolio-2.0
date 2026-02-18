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
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=437,height=475',
        ]);
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('portfolio', 'public');
            $validated['image_path'] = $imagePath;
        }
        Image::create($validated);
        return redirect()->route('hero')
            ->with('success', 'Image uploaded successfully.');
    }

    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    public function destroy(Image $image)
    {
        Storage::delete('public/' . $image->image_path);
        $image->delete();

        return redirect()->route('images.index')
            ->with('success', 'Image deleted successfully.');
    }

}
