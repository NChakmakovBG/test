@extends('admin.layouts.app')
@section('title', 'Settings')
@section('page-title', 'Site Settings')

@section('content')
@if(session('success'))
<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf

    <div class="space-y-8" x-data="{ tab: 'general' }">
        <!-- Tabs -->
        <div class="flex space-x-1 bg-white rounded-xl border border-slate-200 p-1 w-fit">
            <button type="button" @click="tab = 'general'" :class="tab === 'general' ? 'bg-indigo-600 text-white' : 'text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">General</button>
            <button type="button" @click="tab = 'contact'" :class="tab === 'contact' ? 'bg-indigo-600 text-white' : 'text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">Contact</button>
            <button type="button" @click="tab = 'social'" :class="tab === 'social' ? 'bg-indigo-600 text-white' : 'text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">Social Media</button>
            <button type="button" @click="tab = 'seo'" :class="tab === 'seo' ? 'bg-indigo-600 text-white' : 'text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">SEO</button>
        </div>

        @foreach($settings as $group => $items)
        <div x-show="tab === '{{ $group }}'" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            <h2 class="text-lg font-semibold text-slate-800 mb-6 capitalize">{{ $group }} Settings</h2>
            <div class="space-y-5">
                @foreach($items as $setting)
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">{{ $setting->label ?? $setting->key }}</label>
                    @if($setting->type === 'textarea')
                    <textarea name="settings[{{ $setting->key }}]" rows="3" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-y">{{ $setting->value }}</textarea>
                    @else
                    <input type="text" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors">Save All Settings</button>
    </div>
</form>
@endsection
