<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255|unique:services,slug',
            'excerpt'          => 'nullable|string|max:500',
            'description'      => 'nullable|string',
            'icon'             => 'nullable|string|max:100',
            'is_featured'      => 'sometimes|boolean',
            'is_published'     => 'sometimes|boolean',
            'sort_order'       => 'nullable|integer',
            'image'            => 'nullable|image|max:2048',
        ]);

        $validated["is_published"] = $request->has("is_published");
        $validated["is_featured"] = $request->has("is_featured");

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads', 'public');
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255|unique:services,slug,' . $service->id,
            'excerpt'          => 'nullable|string|max:500',
            'description'      => 'nullable|string',
            'icon'             => 'nullable|string|max:100',
            'is_featured'      => 'sometimes|boolean',
            'is_published'     => 'sometimes|boolean',
            'sort_order'       => 'nullable|integer',
            'image'            => 'nullable|image|max:2048',
        ]);

        $validated["is_published"] = $request->has("is_published");
        $validated["is_featured"] = $request->has("is_featured");

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads', 'public');
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
