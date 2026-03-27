<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('sort_order')->get();

        return view('admin.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'position'     => 'nullable|string|max:255',
            'bio'          => 'nullable|string',
            'linkedin'     => 'nullable|url|max:255',
            'twitter'      => 'nullable|url|max:255',
            'email'        => 'nullable|email|max:255',
            'is_published' => 'sometimes|boolean',
            'sort_order'   => 'nullable|integer',
            'photo'        => 'nullable|image|max:2048',
        ]);

        $validated["is_published"] = $request->has("is_published");

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member created successfully.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'position'     => 'nullable|string|max:255',
            'bio'          => 'nullable|string',
            'linkedin'     => 'nullable|url|max:255',
            'twitter'      => 'nullable|url|max:255',
            'email'        => 'nullable|email|max:255',
            'is_published' => 'sometimes|boolean',
            'sort_order'   => 'nullable|integer',
            'photo'        => 'nullable|image|max:2048',
        ]);

        $validated["is_published"] = $request->has("is_published");

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member deleted successfully.');
    }
}
