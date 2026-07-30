<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioGallery;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function show($id)
    {
        $portfolio = Portfolio::with('gallery')->findOrFail($id);

        // Get previous and next portfolio items for navigation
        $previous = Portfolio::where('id', '<', $portfolio->id)->orderBy('id', 'desc')->first();
        $next = Portfolio::where('id', '>', $portfolio->id)->orderBy('id')->first();

        return view('hero-section.show', compact('portfolio', 'previous', 'next'));
    }

    public function filter(Request $request)
    {
        $category = $request->input('category');

        if ($category === '*' || empty($category)) {
            $portfolios = Portfolio::latest()->get();
        } else {
            $portfolios = Portfolio::where('category', $category)->latest()->get();
        }

        return response()->json([
            'html' => view('portfolio.partials.portfolio_items', compact('portfolios'))->render()
        ]);
    }


    public function storeportfolio(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'portfolio_description' => 'required|string',
            'category' => 'required|string|max:255|exists:portfolio_categories,name',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:8192',
            'client' => 'required|string|max:255',
            'live_url' => 'required|string|max:255',
            'start_date' => 'required|date',
            'story' => 'required|string',
            'designer' => 'required|string',
            'approach' => 'required|string',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:8192',
        ]);

        $validated['image_path'] = $request->file('image_path')->store('portfolio', 'public');
        unset($validated['gallery']);

        $portfolio = Portfolio::create($validated);

        foreach ($request->file('gallery', []) as $index => $galleryImage) {
            $portfolio->gallery()->create([
                'image_path' => $galleryImage->store('portfolio', 'public'),
                'order' => $index,
            ]);
        }

        return redirect()->back()->with('success', 'Project added successfully.');
    }
    public function create(){
        $defaultCategories = PortfolioCategory::orderBy('name')->pluck('name');

        return view('portfolio.create', compact('defaultCategories'));
    }
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->back()->with('success', 'portfolio deleted successfully.');
    }
    public function list()
    {
        $portfolios = Portfolio::all();
        return view('portfolio.list', compact('portfolios'));
    }
}
