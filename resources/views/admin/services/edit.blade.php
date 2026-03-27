@extends('admin.layouts.app')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-indigo-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Services
        </a>
    </div>

    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Service Details</h2>
                    <div class="space-y-5">
                        <div>
                            <label for="title" class="block text-sm font-medium text-slate-700 mb-1.5">Title <span class="text-rose-500">*</span></label>
                            <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition @error('title') border-rose-400 bg-rose-50 @enderror">
                            @error('title') <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="slug" class="block text-sm font-medium text-slate-700 mb-1.5">Slug</label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug', $service->slug) }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition @error('slug') border-rose-400 @enderror">
                            @error('slug') <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="excerpt" class="block text-sm font-medium text-slate-700 mb-1.5">Excerpt</label>
                            <textarea id="excerpt" name="excerpt" rows="2" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-none @error('excerpt') border-rose-400 @enderror">{{ old('excerpt', $service->excerpt) }}</textarea>
                            @error('excerpt') <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-slate-700 mb-1.5">Full Description</label>
                            <textarea id="description" name="description" rows="8" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-y @error('description') border-rose-400 @enderror">{{ old('description', $service->description) }}</textarea>
                            @error('description') <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="icon" class="block text-sm font-medium text-slate-700 mb-1.5">Icon Class</label>
                            <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            @error('icon') <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Options</h2>
                    <div class="space-y-4">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $service->is_published) ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500">
                            <span class="text-sm text-slate-700">Published</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $service->is_featured) ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500">
                            <span class="text-sm text-slate-700">Featured</span>
                        </label>
                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-slate-700 mb-1.5">Sort Order</label>
                            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="0" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        </div>
                        <div class="pt-2 border-t border-slate-100 flex gap-3">
                            <button type="submit" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors">Update Service</button>
                            <a href="{{ route('admin.services.index') }}" class="px-4 py-2.5 bg-slate-100 text-slate-700 text-sm font-medium rounded-xl hover:bg-slate-200 transition-colors">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Service Image</h2>
                    @if($service->image)
                    <div class="mb-4 rounded-xl overflow-hidden">
                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="w-full h-32 object-cover">
                    </div>
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('image') <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
