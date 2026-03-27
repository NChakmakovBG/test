@extends('admin.layouts.app')
@section('title', 'View Message')
@section('page-title', 'View Message')

@section('content')
<div class="max-w-3xl">
    <div class="mb-6"><a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-indigo-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>Back to Messages</a></div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
        <div class="flex items-start justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-slate-800">{{ $contactMessage->subject }}</h2>
                <p class="text-sm text-slate-500 mt-1">Received {{ $contactMessage->created_at->format('d M Y \a\t H:i') }}</p>
            </div>
            <form action="{{ route('admin.messages.destroy', $contactMessage) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                @csrf @method('DELETE')
                <button type="submit" class="px-3 py-1.5 text-sm text-rose-600 border border-rose-200 rounded-lg hover:bg-rose-50 transition-colors">Delete</button>
            </form>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-8 p-4 bg-slate-50 rounded-xl">
            <div>
                <span class="text-xs font-medium text-slate-500 uppercase">Name</span>
                <p class="text-sm text-slate-800 mt-1">{{ $contactMessage->name }}</p>
            </div>
            <div>
                <span class="text-xs font-medium text-slate-500 uppercase">Email</span>
                <p class="text-sm text-slate-800 mt-1"><a href="mailto:{{ $contactMessage->email }}" class="text-indigo-600 hover:underline">{{ $contactMessage->email }}</a></p>
            </div>
            @if($contactMessage->phone)
            <div>
                <span class="text-xs font-medium text-slate-500 uppercase">Phone</span>
                <p class="text-sm text-slate-800 mt-1">{{ $contactMessage->phone }}</p>
            </div>
            @endif
            @if($contactMessage->company)
            <div>
                <span class="text-xs font-medium text-slate-500 uppercase">Company</span>
                <p class="text-sm text-slate-800 mt-1">{{ $contactMessage->company }}</p>
            </div>
            @endif
        </div>

        <div>
            <h3 class="text-sm font-semibold text-slate-700 mb-3">Message</h3>
            <div class="prose prose-sm max-w-none text-slate-600">
                {!! nl2br(e($contactMessage->message)) !!}
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100">
            <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}" class="px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition-colors">Reply via Email</a>
        </div>
    </div>
</div>
@endsection
