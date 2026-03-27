<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolioItems = PortfolioItem::published()->get();

        return view('frontend.portfolio', compact('portfolioItems'));
    }

    public function show(string $slug)
    {
        $portfolioItem = PortfolioItem::published()->where('slug', $slug)->firstOrFail();

        return view('frontend.portfolio-show', compact('portfolioItem'));
    }
}
