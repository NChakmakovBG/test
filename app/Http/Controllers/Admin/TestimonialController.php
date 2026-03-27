<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name'     => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company'  => 'nullable|string|max:255',
            'content'         => 'required|string',
            'rating'          => 'nullable|integer|min:1|max:5',
            'is_published'    => 'sometimes|boolean',
            'sort_order'      => 'nullable|integer',
            'avatar'          => 'nullable|image|max:2048',
        ]);

        $validated["is_published"] = $request->has("is_published");

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('uploads', 'public');
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name'     => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company'  => 'nullable|string|max:255',
            'content'         => 'required|string',
            'rating'          => 'nullable|integer|min:1|max:5',
            'is_published'    => 'sometimes|boolean',
            'sort_order'      => 'nullable|integer',
            'avatar'          => 'nullable|image|max:2048',
        ]);

        $validated["is_published"] = $request->has("is_published");

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('uploads', 'public');
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
