<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Page;
use App\Models\PortfolioItem;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'pages'             => Page::count(),
            'services'          => Service::count(),
            'testimonials'      => Testimonial::count(),
            'team_members'      => TeamMember::count(),
            'contact_messages'  => ContactMessage::where('is_read', false)->count(),
            'portfolio_items'   => PortfolioItem::count(),
        ];

        $recentMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard.index', compact('counts', 'recentMessages'));
    }
}
