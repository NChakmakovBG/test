<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::published()->get();

        return view('frontend.services', compact('services'));
    }

    public function show(string $slug)
    {
        $service = Service::published()->where('slug', $slug)->firstOrFail();

        return view('frontend.service', compact('service'));
    }
}
