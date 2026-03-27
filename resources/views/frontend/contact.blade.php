@extends('frontend.layouts.app')

@section('title', 'Contact Us | LuminaScott')
@section('meta_description', 'Get in touch with LuminaScott. We would love to discuss how AI can transform your business. Contact us for a free consultation.')

@section('content')
<!-- Hero -->
<section class="pt-32 pb-16 relative hero-grid">
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-glow"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-indigo-400 text-sm font-semibold uppercase tracking-wider">Contact</span>
        <h1 class="text-5xl font-bold text-white mt-4 mb-6">Get in <span class="gradient-text">Touch</span></h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-lg">We would love to hear from you. Whether you have a question about our services, need a consultation, or just want to chat about AI, we are here to help.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Contact Form -->
            <div class="lg:col-span-2">
                @if(session('success'))
                <div class="mb-8 p-6 rounded-xl bg-emerald-500/10 border border-emerald-500/20">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-emerald-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <p class="text-emerald-300 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                <div class="glass rounded-2xl p-8 md:p-10 glow">
                    <h2 class="text-2xl font-bold text-white mb-8">Send Us a Message</h2>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-300 mb-2">Full Name <span class="text-red-400">*</span></label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none transition-all @error('name') border-red-500 @enderror"
                                    placeholder="John Smith">
                                @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email Address <span class="text-red-400">*</span></label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none transition-all @error('email') border-red-500 @enderror"
                                    placeholder="john@company.co.uk">
                                @error('email') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-slate-300 mb-2">Telephone</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none transition-all"
                                    placeholder="+44 20 7946 0958">
                            </div>
                            <div>
                                <label for="company" class="block text-sm font-medium text-slate-300 mb-2">Company</label>
                                <input type="text" name="company" id="company" value="{{ old('company') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none transition-all"
                                    placeholder="Your Company Ltd">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-slate-300 mb-2">Subject <span class="text-red-400">*</span></label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                                class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none transition-all @error('subject') border-red-500 @enderror"
                                placeholder="How can we help you?">
                            @error('subject') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-300 mb-2">Message <span class="text-red-400">*</span></label>
                            <textarea name="message" id="message" rows="6" required
                                class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none transition-all resize-none @error('message') border-red-500 @enderror"
                                placeholder="Tell us about your project or enquiry...">{{ old('message') }}</textarea>
                            @error('message') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="w-full sm:w-auto px-8 py-4 rounded-xl font-semibold bg-gradient-to-r from-indigo-500 to-violet-600 hover:from-indigo-400 hover:to-violet-500 text-white shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition-all duration-300">
                            Send Message
                            <svg class="inline-block w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <div class="glass rounded-2xl p-8 glow-hover transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500/20 to-violet-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Our Office</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">{{ $settings['contact_address'] ?? '71-75 Shelton Street, Covent Garden, London, WC2H 9JQ' }}</p>
                </div>

                <div class="glass rounded-2xl p-8 glow-hover transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500/20 to-violet-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Email</h3>
                    <a href="mailto:{{ $settings['contact_email'] ?? 'hello@luminascott.com' }}" class="text-indigo-400 hover:text-indigo-300 text-sm transition-colors">{{ $settings['contact_email'] ?? 'hello@luminascott.com' }}</a>
                </div>

                <div class="glass rounded-2xl p-8 glow-hover transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500/20 to-violet-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Telephone</h3>
                    <a href="tel:{{ $settings['contact_phone'] ?? '+442079460958' }}" class="text-indigo-400 hover:text-indigo-300 text-sm transition-colors">{{ $settings['contact_phone'] ?? '+44 20 7946 0958' }}</a>
                </div>

                <div class="glass rounded-2xl p-8 glow-hover transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500/20 to-violet-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Working Hours</h3>
                    <p class="text-slate-400 text-sm">Monday - Friday: 9:00 - 18:00</p>
                    <p class="text-slate-500 text-sm">Weekends: By appointment</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
