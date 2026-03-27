@extends('admin.layouts.app')
@section('title', 'Team Members')
@section('page-title', 'Team Members')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h2 class="text-lg font-semibold text-slate-800">All Team Members</h2>
    <a href="{{ route('admin.team.create') }}" class="px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors">Add Team Member</a>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 border-b border-slate-200">
            <tr>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Name</th>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Position</th>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Published</th>
                <th class="text-right px-6 py-3 font-medium text-slate-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($teamMembers as $member)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-6 py-4 font-medium text-slate-800">{{ $member->name }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $member->position }}</td>
                <td class="px-6 py-4">
                    <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $member->is_published ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">{{ $member->is_published ? 'Published' : 'Draft' }}</span>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.team.edit', $member) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                    <form action="{{ route('admin.team.destroy', $member) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">@csrf @method('DELETE')<button type="submit" class="text-rose-600 hover:text-rose-800">Delete</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-8 text-center text-slate-400">No team members yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
