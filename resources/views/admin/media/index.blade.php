@extends('admin.layouts.app')
@section('title', 'Media Library')
@section('page-title', 'Media Library')

@section('content')
@if(session('success'))
<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm">{{ session('success') }}</div>
@endif

<!-- Upload Form -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 mb-8">
    <h2 class="text-base font-semibold text-slate-800 mb-4">Upload New File</h2>
    <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="flex items-end gap-4">
        @csrf
        <div class="flex-1">
            <input type="file" name="file" required class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @error('file') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <input type="text" name="alt_text" placeholder="Alt text (optional)" class="px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>
        <button type="submit" class="px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors whitespace-nowrap">Upload</button>
    </form>
</div>

<!-- Media Grid -->
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
    @forelse($media as $item)
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden group">
        <div class="aspect-square bg-slate-100 flex items-center justify-center overflow-hidden">
            @if(Str::startsWith($item->mime_type, 'image/'))
            <img src="{{ Storage::url($item->path) }}" alt="{{ $item->alt_text ?? $item->filename }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            @else
            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            @endif
        </div>
        <div class="p-2">
            <p class="text-xs text-slate-600 truncate">{{ $item->filename }}</p>
            <div class="flex items-center justify-between mt-1">
                <span class="text-xs text-slate-400">{{ number_format($item->size / 1024, 1) }} KB</span>
                <form action="{{ route('admin.media.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this file?')">@csrf @method('DELETE')<button type="submit" class="text-xs text-rose-500 hover:text-rose-700">Delete</button></form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-12 text-slate-400">No media uploaded yet.</div>
    @endforelse
</div>
@endsection
