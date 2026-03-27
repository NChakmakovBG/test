@extends('admin.layouts.app')
@section('title', 'Edit Portfolio Item')
@section('page-title', 'Edit Portfolio Item')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6"><a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-indigo-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>Back to Portfolio</a></div>
    <form method="POST" action="{{ route('admin.portfolio.update', $portfolioItem) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Project Details</h2>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Title <span class="text-rose-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $portfolioItem->title) }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('title') border-rose-400 @enderror">
                            @error('title') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug', $portfolioItem->slug) }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('slug') border-rose-400 @enderror">
                            @error('slug') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Excerpt</label>
                            <textarea name="excerpt" rows="2" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none">{{ old('excerpt', $portfolioItem->excerpt) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Full Description</label>
                            <textarea name="description" rows="8" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-y">{{ old('description', $portfolioItem->description) }}</textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Client Name</label><input type="text" name="client_name" value="{{ old('client_name', $portfolioItem->client_name) }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"></div>
                            <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Category</label><input type="text" name="category" value="{{ old('category', $portfolioItem->category) }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Technologies (comma-separated)</label>
                            <input type="text" name="technologies" value="{{ old('technologies', $portfolioItem->technologies ? implode(', ', $portfolioItem->technologies) : '') }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Project URL</label><input type="url" name="url" value="{{ old('url', $portfolioItem->url) }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"></div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="space-y-4">
                        <label class="flex items-center gap-3 cursor-pointer"><input type="checkbox" name="is_published" value="1" {{ old('is_published', $portfolioItem->is_published) ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500"><span class="text-sm text-slate-700">Published</span></label>
                        <label class="flex items-center gap-3 cursor-pointer"><input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $portfolioItem->is_featured) ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500"><span class="text-sm text-slate-700">Featured</span></label>
                        <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Sort Order</label><input type="number" name="sort_order" value="{{ old('sort_order', $portfolioItem->sort_order) }}" min="0" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"></div>
                        <div class="pt-2 border-t border-slate-100"><button type="submit" class="w-full px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors">Update Project</button></div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Project Image</h2>
                    @if($portfolioItem->image)<div class="mb-3 rounded-xl overflow-hidden"><img src="{{ Storage::url($portfolioItem->image) }}" class="w-full h-32 object-cover"></div>@endif
                    <input type="file" name="image" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-indigo-50 file:text-indigo-700">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
