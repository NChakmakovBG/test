@extends('admin.layouts.app')
@section('title', 'Messages')
@section('page-title', 'Contact Messages')

@section('content')
@if(session('success'))
<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 border-b border-slate-200">
            <tr>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Name</th>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Email</th>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Subject</th>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Date</th>
                <th class="text-left px-6 py-3 font-medium text-slate-600">Status</th>
                <th class="text-right px-6 py-3 font-medium text-slate-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($messages as $message)
            <tr class="{{ !$message->is_read ? 'bg-indigo-50/50' : '' }} hover:bg-slate-50 transition-colors">
                <td class="px-6 py-4 {{ !$message->is_read ? 'font-semibold text-slate-900' : 'text-slate-800' }}">{{ $message->name }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $message->email }}</td>
                <td class="px-6 py-4 text-slate-600">{{ Str::limit($message->subject, 40) }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $message->created_at->format('d M Y, H:i') }}</td>
                <td class="px-6 py-4">
                    <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $message->is_read ? 'bg-slate-100 text-slate-500' : 'bg-indigo-100 text-indigo-700' }}">{{ $message->is_read ? 'Read' : 'Unread' }}</span>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.messages.show', $message) }}" class="text-indigo-600 hover:text-indigo-800">View</a>
                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Delete this message?')">@csrf @method('DELETE')<button type="submit" class="text-rose-600 hover:text-rose-800">Delete</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-6 py-8 text-center text-slate-400">No messages yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
