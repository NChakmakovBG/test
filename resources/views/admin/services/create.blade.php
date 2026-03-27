@extends('admin.layouts.app')

@section('title', 'Add Service')
@section('page-title', 'Add Service')

@section('content')

<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}"
           class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-indigo-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Services
        </a>
    </div>

    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Main column --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Service Details</h2>
                    <div class="space-y-5">

                        {{-- Title --}}
                        <div>
                            <label for="title" class="block text-sm font-medium text-slate-700 mb-1.5">
                                Title <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="title" name="title"
                                   value="{{ old('title') }}"
                                   placeholder="Service title"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition
                                          @error('title') border-rose-400 bg-rose-50 @enderror"
                                   oninput="generateSlug(this.value)">
                            @error('title')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div>
                            <label for="slug" class="block text-sm font-medium text-slate-700 mb-1.5">Slug</label>
                            <div class="flex items-center border border-slate-300 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-indigo-500 focus-within:border-transparent
                                        @error('slug') border-rose-400 @enderror">
                                <span class="px-3 py-2.5 bg-slate-50 text-slate-500 text-sm border-r border-slate-300 select-none">/services/</span>
                                <input type="text" id="slug" name="slug"
                                       value="{{ old('slug') }}"
                                       placeholder="service-slug"
                                       class="flex-1 px-3 py-2.5 text-sm text-slate-800 placeholder-slate-400 bg-white focus:outline-none">
                            </div>
                            @error('slug')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Excerpt --}}
                        <div>
                            <label for="excerpt" class="block text-sm font-medium text-slate-700 mb-1.5">Excerpt</label>
                            <textarea id="excerpt" name="excerpt" rows="2"
                                      placeholder="Brief summary of the service..."
                                      class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 placeholder-slate-400
                                             focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-none
                                             @error('excerpt') border-rose-400 bg-rose-50 @enderror">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div>
                            <label for="description" class="block text-sm font-medium text-slate-700 mb-1.5">Full Description</label>
                            <textarea id="description" name="description" rows="8"
                                      placeholder="Full service description..."
                                      class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 placeholder-slate-400
                                             focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-y
                                             @error('description') border-rose-400 bg-rose-50 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Icon --}}
                        <div>
                            <label for="icon" class="block text-sm font-medium text-slate-700 mb-1.5">Icon Class</label>
                            <input type="text" id="icon" name="icon"
                                   value="{{ old('icon') }}"
                                   placeholder="e.g. fas fa-cog or heroicon class"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition
                                          @error('icon') border-rose-400 bg-rose-50 @enderror">
                            <p class="mt-1 text-xs text-slate-400">Enter a Font Awesome or custom icon class.</p>
                            @error('icon')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">

                {{-- Publish --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Options</h2>
                    <div class="space-y-4">

                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="is_published" id="is_published" value="1"
                                   {{ old('is_published') ? 'checked' : '' }}
                                   class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500">
                            <span class="text-sm text-slate-700">Published</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                   {{ old('is_featured') ? 'checked' : '' }}
                                   class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500">
                            <span class="text-sm text-slate-700">Featured</span>
                        </label>

                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-slate-700 mb-1.5">Sort Order</label>
                            <input type="number" id="sort_order" name="sort_order"
                                   value="{{ old('sort_order', 0) }}" min="0"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        </div>

                        <div class="pt-2 border-t border-slate-100 flex gap-3">
                            <button type="submit"
                                    class="flex-1 px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors">
                                Save Service
                            </button>
                            <a href="{{ route('admin.services.index') }}"
                               class="px-4 py-2.5 bg-slate-100 text-slate-700 text-sm font-medium rounded-xl hover:bg-slate-200 transition-colors">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Service Image --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Service Image</h2>
                    <label for="image"
                           class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-300 rounded-xl cursor-pointer hover:border-indigo-400 hover:bg-indigo-50/50 transition-colors">
                        <svg class="w-8 h-8 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-xs text-slate-500">Click to upload image</span>
                        <span class="text-xs text-slate-400 mt-0.5">PNG, JPG, WebP up to 5MB</span>
                    </label>
                    <input type="file" id="image" name="image" accept="image/*" class="hidden">
                    @error('image')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
    function generateSlug(title) {
        const slug = title
            .toLowerCase().trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    }
</script>
@endpush
