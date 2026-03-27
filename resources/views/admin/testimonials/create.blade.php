@extends('admin.layouts.app')
@section('title', 'Add Testimonial')
@section('page-title', 'Add Testimonial')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-indigo-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>Back to Testimonials
        </a>
    </div>
    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Testimonial Details</h2>
                    <div class="space-y-5">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Client Name <span class="text-rose-500">*</span></label>
                                <input type="text" name="client_name" value="{{ old('client_name') }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('client_name') border-rose-400 @enderror">
                                @error('client_name') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Position</label>
                                <input type="text" name="client_position" value="{{ old('client_position') }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Company</label>
                            <input type="text" name="client_company" value="{{ old('client_company') }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Testimonial Content <span class="text-rose-500">*</span></label>
                            <textarea name="content" rows="5" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-y @error('content') border-rose-400 @enderror">{{ old('content') }}</textarea>
                            @error('content') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Options</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Rating</label>
                            <select name="rating" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                @for($i = 5; $i >= 1; $i--)<option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>@endfor
                            </select>
                        </div>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500">
                            <span class="text-sm text-slate-700">Published</span>
                        </label>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>
                        <div class="pt-2 border-t border-slate-100">
                            <button type="submit" class="w-full px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors">Save Testimonial</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-5">Avatar</h2>
                    <input type="file" name="avatar" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-indigo-50 file:text-indigo-700">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
