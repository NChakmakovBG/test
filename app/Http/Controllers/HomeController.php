<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::published()->featured()->limit(3)->get();
        $testimonials     = Testimonial::published()->get();
        $teamMembers      = TeamMember::published()->get();
        $portfolioItems   = PortfolioItem::published()->featured()->limit(6)->get();
        $settings         = SiteSetting::all()->pluck('value', 'key');

        return view('frontend.home', compact(
            'featuredServices',
            'testimonials',
            'teamMembers',
            'portfolioItems',
            'settings',
        ));
    }
}
