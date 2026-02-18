<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function show($id)
    {
        $portfolio = Portfolio::with('image_path')->findOrFail($id);

        // Get previous and next portfolio items for navigation
        $previous = Portfolio::where('id', '<', $portfolio->id)->orderBy('id', 'desc')->first();
        $next = Portfolio::where('id', '>', $portfolio->id)->orderBy('id')->first();

        return view('hero.show', compact('portfolio', 'previous', 'next'));
    }
//    public function thumbnails($id)
//    {
//        return Portfolio::with('thumbnails')->findOrFail($id)->thumbnails;
//    }
    public function filter(Request $request)
    {
        $category = $request->input('category');

        if ($category === '*' || empty($category)) {
            $portfolios = Portfolio::orderBy('order')->get();
        } else {
            $portfolios = Portfolio::where('category', $category)->orderBy('order')->get();
        }
        $thumbnails = $this->thumbnails($request);

        return response()->json([
            'html' => view('portfolio.partials.portfolio_items', compact('portfolios','thumbnails'))->render()
        ]);
    }


    public function storeportfolio(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'portfolio_description' => 'required|string',
            'category' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category.*' => 'string|max:255',
            'client' => 'required|string|max:255',
            'live_url' => 'required|string|max:255',
            'start_date' => 'required',
            'thumbnail1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'thumbnail2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'thumbnail3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'story' => 'required|string',
            'designer' => 'required|string',
            'approach' => 'required|string',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('portfolio', 'public');
            $validated['image_path'] = $imagePath;
        }

        if ($request->hasFile('thumbnail1')) {
            $thumbnail1 = $request->file('thumbnail1')->store('portfolio', 'public');
            $validated['thumbnail1'] = $thumbnail1;
        }
        if ($request->hasFile('thumbnail2')) {
            $thumbnail2 = $request->file('thumbnail2')->store('portfolio', 'public');
            $validated['thumbnail2'] = $thumbnail2;
        }
        if ($request->hasFile('thumbnail3')) {
            $thumbnail3 = $request->file('thumbnail3')->store('portfolio', 'public');
            $validated['thumbnail3'] = $thumbnail3;
        }

        Portfolio::create($validated);

        return redirect()->back()->with('success', 'Project added successfully.');
  }
    public function create(){
        $defaultCategories = ['Web Design', 'Web Development', 'App Development', 'Marketing'];
        $selectedCategories = is_array($project->category ?? null)
            ? $project->category
            : explode(',', $project->category ?? '');

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
