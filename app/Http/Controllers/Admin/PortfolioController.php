<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolioItems = PortfolioItem::orderBy('sort_order')->get();

        return view('admin.portfolio.index', compact('portfolioItems'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255|unique:portfolio_items,slug',
            'excerpt'          => 'nullable|string|max:500',
            'description'      => 'nullable|string',
            'client_name'      => 'nullable|string|max:255',
            'category'         => 'nullable|string|max:100',
            'technologies'     => 'nullable|string',
            'url'              => 'nullable|url|max:255',
            'is_featured'      => 'sometimes|boolean',
            'is_published'     => 'sometimes|boolean',
            'sort_order'       => 'nullable|integer',
            'image'            => 'nullable|image|max:2048',
        ]);

        $validated["is_published"] = $request->has("is_published");
        $validated["is_featured"] = $request->has("is_featured");

        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads', 'public');
        }

        PortfolioItem::create($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio item created successfully.');
    }

    public function edit(PortfolioItem $portfolio)
    {
        $portfolioItem = $portfolio;
        return view('admin.portfolio.edit', compact('portfolioItem'));
    }

    public function update(Request $request, PortfolioItem $portfolio)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255|unique:portfolio_items,slug,' . $portfolio->id,
            'excerpt'          => 'nullable|string|max:500',
            'description'      => 'nullable|string',
            'client_name'      => 'nullable|string|max:255',
            'category'         => 'nullable|string|max:100',
            'technologies'     => 'nullable|string',
            'url'              => 'nullable|url|max:255',
            'is_featured'      => 'sometimes|boolean',
            'is_published'     => 'sometimes|boolean',
            'sort_order'       => 'nullable|integer',
            'image'            => 'nullable|image|max:2048',
        ]);

        $validated["is_published"] = $request->has("is_published");
        $validated["is_featured"] = $request->has("is_featured");

        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads', 'public');
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy(PortfolioItem $portfolio)
    {
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio item deleted successfully.');
    }
}
