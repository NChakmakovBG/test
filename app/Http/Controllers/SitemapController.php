<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PortfolioItem;
use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $pages          = Page::published()->get(['slug', 'updated_at']);
        $services       = Service::published()->get(['slug', 'updated_at']);
        $portfolioItems = PortfolioItem::published()->get(['slug', 'updated_at']);

        $content = view('frontend.sitemap', compact('pages', 'services', 'portfolioItems'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
