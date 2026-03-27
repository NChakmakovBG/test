@extends('admin.layouts.app')
@section('title', 'Testimonials')
@section('page-title', 'Testimonials')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h2 class="text-lg font-semibold text-slate-800">All Testimonials</h2>
    <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors">Add Testimonial</a>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 border-b border-slate-200">
            <tr>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Client</th>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Company</th>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Rating</th>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Published</th>
                <th class="text-right px-6 py-3 font-medium text-slate-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($testimonials as $testimonial)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-6 py-4 font-medium text-slate-800">{{ $testimonial->client_name }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $testimonial->client_company ?? '—' }}</td>
                <td class="px-6 py-4">
                    <div class="flex">@for($i = 0; $i < $testimonial->rating; $i++)<svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                </td>
                <td class="px-6 py-4">
                    <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $testimonial->is_published ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">{{ $testimonial->is_published ? 'Published' : 'Draft' }}</span>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">@csrf @method('DELETE')<button type="submit" class="text-rose-600 hover:text-rose-800">Delete</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-8 text-center text-slate-400">No testimonials yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
