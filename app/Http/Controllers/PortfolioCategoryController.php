<?php

namespace App\Http\Controllers;

use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $categories = PortfolioCategory::orderBy('name')->get();

        return view('portfolio.categories', compact('categories'));
    }

    public function create()
    {
        return view('portfolio.category-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:portfolio_categories,name',
        ]);

        PortfolioCategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return redirect()->route('portfolio-categories.index')->with('success', 'Category added successfully.');
    }

    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('portfolio.category-form', ['category' => $portfolioCategory]);
    }

    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:portfolio_categories,name,'.$portfolioCategory->id,
        ]);

        $portfolioCategory->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return redirect()->route('portfolio-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->delete();

        return redirect()->route('portfolio-categories.index')->with('success', 'Category deleted successfully.');
    }
}
