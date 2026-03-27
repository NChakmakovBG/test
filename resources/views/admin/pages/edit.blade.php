@extends('admin.layouts.app')

@section('title', 'Edit Page — ' . $page->title)
@section('page-title', 'Edit Page')

@section('content')

<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.pages.index') }}"
           class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-indigo-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Pages
        </a>
    </div>

    <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Main content column --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Basic Details --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Page Details</h2>

                    <div class="space-y-5">
                        {{-- Title --}}
                        <div>
                            <label for="title" class="block text-sm font-medium text-slate-700 mb-1.5">
                                Page Title <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="title" name="title"
                                   value="{{ old('title', $page->title) }}"
                                   placeholder="Enter page title"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition
                                          @error('title') border-rose-400 bg-rose-50 @enderror">
                            @error('title')
                                <p class="mt-1.5 text-xs text-rose-600 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div>
                            <label for="slug" class="block text-sm font-medium text-slate-700 mb-1.5">
                                Slug <span class="text-rose-500">*</span>
                            </label>
                            <div class="flex items-center border border-slate-300 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-indigo-500 focus-within:border-transparent
                                        @error('slug') border-rose-400 bg-rose-50 @enderror">
                                <span class="px-3 py-2.5 bg-slate-50 text-slate-500 text-sm border-r border-slate-300 select-none">/</span>
                                <input type="text" id="slug" name="slug"
                                       value="{{ old('slug', $page->slug) }}"
                                       placeholder="page-slug"
                                       class="flex-1 px-3 py-2.5 text-sm text-slate-800 placeholder-slate-400 bg-white focus:outline-none">
                            </div>
                            @error('slug')
                                <p class="mt-1.5 text-xs text-rose-600 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Content --}}
                        <div>
                            <label for="content" class="block text-sm font-medium text-slate-700 mb-1.5">Content</label>
                            <textarea id="content" name="content" rows="10"
                                      placeholder="Enter page content..."
                                      class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 placeholder-slate-400
                                             focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-y
                                             @error('content') border-rose-400 bg-rose-50 @enderror">{{ old('content', $page->content) }}</textarea>
                            @error('content')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- SEO --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">SEO Settings</h2>
                    <div class="space-y-5">

                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-slate-700 mb-1.5">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title"
                                   value="{{ old('meta_title', $page->meta_title) }}"
                                   placeholder="SEO page title (recommended: 50–60 characters)"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition
                                          @error('meta_title') border-rose-400 bg-rose-50 @enderror">
                            @error('meta_title')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-slate-700 mb-1.5">Meta Description</label>
                            <textarea id="meta_description" name="meta_description" rows="3"
                                      placeholder="Brief page description for search engines (recommended: 150–160 characters)"
                                      class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 placeholder-slate-400
                                             focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-none
                                             @error('meta_description') border-rose-400 bg-rose-50 @enderror">{{ old('meta_description', $page->meta_description) }}</textarea>
                            @error('meta_description')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_keywords" class="block text-sm font-medium text-slate-700 mb-1.5">Meta Keywords</label>
                            <input type="text" id="meta_keywords" name="meta_keywords"
                                   value="{{ old('meta_keywords', $page->meta_keywords) }}"
                                   placeholder="keyword1, keyword2, keyword3"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 placeholder-slate-400
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition
                                          @error('meta_keywords') border-rose-400 bg-rose-50 @enderror">
                            @error('meta_keywords')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            {{-- Sidebar options --}}
            <div class="space-y-6">

                {{-- Publish --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Publish</h2>
                    <div class="space-y-4">

                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="is_published" id="is_published" value="1"
                                   {{ old('is_published', $page->is_published) ? 'checked' : '' }}
                                   class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500">
                            <span class="text-sm text-slate-700">Published</span>
                        </label>

                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-slate-700 mb-1.5">Sort Order</label>
                            <input type="number" id="sort_order" name="sort_order"
                                   value="{{ old('sort_order', $page->sort_order) }}"
                                   min="0"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800
                                          focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition
                                          @error('sort_order') border-rose-400 bg-rose-50 @enderror">
                            @error('sort_order')
                                <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-2 border-t border-slate-100 flex gap-3">
                            <button type="submit"
                                    class="flex-1 px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors text-center">
                                Update Page
                            </button>
                            <a href="{{ route('admin.pages.index') }}"
                               class="px-4 py-2.5 bg-slate-100 text-slate-700 text-sm font-medium rounded-xl hover:bg-slate-200 transition-colors">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Template --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Template</h2>
                    <div>
                        <label for="template" class="block text-sm font-medium text-slate-700 mb-1.5">Page Template</label>
                        <select id="template" name="template"
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm text-slate-800 bg-white
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition
                                       @error('template') border-rose-400 @enderror">
                            <option value="default"  {{ old('template', $page->template) == 'default'  ? 'selected' : '' }}>Default</option>
                            <option value="about"    {{ old('template', $page->template) == 'about'    ? 'selected' : '' }}>About</option>
                            <option value="services" {{ old('template', $page->template) == 'services' ? 'selected' : '' }}>Services</option>
                        </select>
                        @error('template')
                            <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Featured Image --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Featured Image</h2>
                    <div>
                        @if($page->featured_image)
                            <div class="mb-3 rounded-xl overflow-hidden border border-slate-200">
                                <img src="{{ asset('storage/' . $page->featured_image) }}"
                                     alt="Current featured image"
                                     class="w-full h-32 object-cover">
                            </div>
                            <p class="text-xs text-slate-400 mb-3">Upload a new image to replace the current one.</p>
                        @endif
                        <label for="featured_image"
                               class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-300 rounded-xl cursor-pointer hover:border-indigo-400 hover:bg-indigo-50/50 transition-colors">
                            <svg class="w-8 h-8 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-xs text-slate-500">Click to upload image</span>
                            <span class="text-xs text-slate-400 mt-0.5">PNG, JPG, WebP up to 5MB</span>
                        </label>
                        <input type="file" id="featured_image" name="featured_image" accept="image/*" class="hidden">
                        @error('featured_image')
                            <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Danger zone --}}
                <div class="bg-white rounded-2xl border border-rose-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-rose-700 mb-3">Danger Zone</h2>
                    <p class="text-xs text-slate-500 mb-4">Permanently delete this page. This cannot be undone.</p>
                    <form method="POST" action="{{ route('admin.pages.destroy', $page) }}"
                          onsubmit="return confirm('Are you sure you want to delete this page? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full px-4 py-2.5 bg-rose-600 text-white text-sm font-medium rounded-xl hover:bg-rose-700 transition-colors">
                            Delete Page
                        </button>
                    </form>
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
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    }
</script>
@endpush
