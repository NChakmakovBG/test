@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Stat Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 mb-8">

    {{-- Total Pages --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-5 flex items-center gap-4 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </div>
        <div>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['pages'] ?? 0 }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Total Pages</p>
        </div>
        <a href="{{ route('admin.pages.index') }}" class="ml-auto text-indigo-500 hover:text-indigo-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    {{-- Services --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-5 flex items-center gap-4 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-violet-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
            </svg>
        </div>
        <div>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['services'] ?? 0 }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Services</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="ml-auto text-violet-500 hover:text-violet-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    {{-- Testimonials --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-5 flex items-center gap-4 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-sky-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
        </div>
        <div>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['testimonials'] ?? 0 }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Testimonials</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="ml-auto text-sky-500 hover:text-sky-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    {{-- Team Members --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-5 flex items-center gap-4 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['team'] ?? 0 }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Team Members</p>
        </div>
        <a href="{{ route('admin.team.index') }}" class="ml-auto text-amber-500 hover:text-amber-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    {{-- Unread Messages --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-5 flex items-center gap-4 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-rose-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <div>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['unread_messages'] ?? 0 }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Unread Messages</p>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="ml-auto text-rose-500 hover:text-rose-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    {{-- Portfolio Items --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-5 flex items-center gap-4 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['portfolio'] ?? 0 }}</p>
            <p class="text-sm text-slate-500 mt-0.5">Portfolio Items</p>
        </div>
        <a href="{{ route('admin.portfolio.index') }}" class="ml-auto text-emerald-500 hover:text-emerald-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

</div>

{{-- Recent Messages --}}
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
        <h2 class="text-base font-semibold text-slate-800">Recent Messages</h2>
        <a href="{{ route('admin.messages.index') }}"
           class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
            View all
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-slate-50 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Subject</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Received</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($recentMessages ?? [] as $message)
                    <tr class="{{ !$message->is_read ? 'bg-indigo-50/40' : '' }} hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-slate-800 whitespace-nowrap">
                            {{ $message->name }}
                        </td>
                        <td class="px-6 py-4 text-slate-600 max-w-xs truncate">
                            {{ $message->subject }}
                        </td>
                        <td class="px-6 py-4 text-slate-500">
                            {{ $message->email }}
                        </td>
                        <td class="px-6 py-4 text-slate-500 whitespace-nowrap">
                            {{ $message->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4">
                            @if(!$message->is_read)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-700">
                                    Unread
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                    Read
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.messages.show', $message) }}"
                               class="inline-flex items-center gap-1 px-3 py-1.5 bg-indigo-600 text-white text-xs font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                            <svg class="w-10 h-10 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            No messages yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
