<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $settings['default_meta_title'] ?? 'LuminaScott | AI Implementation & Consulting')</title>
    <meta name="description" content="@yield('meta_description', $settings['default_meta_description'] ?? 'LuminaScott is a leading AI implementation consultancy helping businesses harness artificial intelligence.')">
    <meta name="keywords" content="@yield('meta_keywords', 'AI consulting, artificial intelligence, machine learning, AI implementation, London, UK')">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', $settings['default_meta_title'] ?? 'LuminaScott')">
    <meta property="og:description" content="@yield('meta_description', $settings['default_meta_description'] ?? '')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="LuminaScott">

    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        display: ['Inter', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @if(!empty($settings['google_analytics']))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings['google_analytics'] }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $settings['google_analytics'] }}');
    </script>
    @endif

    <style>
        [x-cloak] { display: none !important; }

        .gradient-text {
            background: linear-gradient(135deg, #818cf8, #a78bfa, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-light {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glow {
            box-shadow: 0 0 40px rgba(99, 102, 241, 0.15);
        }

        .glow-hover:hover {
            box-shadow: 0 0 60px rgba(99, 102, 241, 0.25);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-10px) rotate(1deg); }
            66% { transform: translateY(5px) rotate(-1deg); }
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.8; }
        }

        @keyframes slide-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-delayed { animation: float 8s ease-in-out 2s infinite; }
        .animate-pulse-glow { animation: pulse-glow 4s ease-in-out infinite; }
        .animate-slide-up { animation: slide-up 0.8s ease-out forwards; }

        .hero-grid {
            background-image:
                linear-gradient(rgba(99, 102, 241, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 102, 241, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .card-shine {
            position: relative;
            overflow: hidden;
        }
        .card-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.03), transparent);
            transition: left 0.5s;
        }
        .card-shine:hover::before {
            left: 100%;
        }
    </style>

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "LuminaScott",
        "description": "{{ $settings['site_description'] ?? 'Leading AI implementation consultancy' }}",
        "url": "{{ url('/') }}",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "71-75 Shelton Street, Covent Garden",
            "addressLocality": "London",
            "postalCode": "WC2H 9JQ",
            "addressCountry": "GB"
        },
        "telephone": "{{ $settings['contact_phone'] ?? '' }}",
        "email": "{{ $settings['contact_email'] ?? '' }}",
        "sameAs": [
            "{{ $settings['linkedin'] ?? '' }}",
            "{{ $settings['twitter'] ?? '' }}",
            "{{ $settings['facebook'] ?? '' }}"
        ]
    }
    </script>
</head>
<body class="bg-slate-950 text-white font-sans antialiased">

    <!-- Navigation -->
    <nav x-data="{ open: false, scrolled: false }"
         x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
         :class="scrolled ? 'bg-slate-950/95 backdrop-blur-lg shadow-lg shadow-black/20 border-b border-white/5' : 'bg-transparent'"
         class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold gradient-text">LuminaScott</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-200">Home</a>
                    <a href="{{ route('services.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-200">Services</a>
                    <a href="{{ route('portfolio.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-200">Portfolio</a>
                    <a href="{{ url('/page/about') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all duration-200">About</a>
                    <a href="{{ route('contact.show') }}" class="ml-4 px-6 py-2.5 rounded-lg text-sm font-semibold bg-gradient-to-r from-indigo-500 to-violet-600 hover:from-indigo-400 hover:to-violet-500 text-white shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition-all duration-200">Get in Touch</a>
                </div>

                <!-- Mobile menu button -->
                <button @click="open = !open" class="md:hidden p-2 rounded-lg text-slate-400 hover:text-white hover:bg-white/5">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                 class="md:hidden pb-4 border-t border-white/5 mt-2 pt-4">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-white/5">Home</a>
                <a href="{{ route('services.index') }}" class="block px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-white/5">Services</a>
                <a href="{{ route('portfolio.index') }}" class="block px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-white/5">Portfolio</a>
                <a href="{{ url('/page/about') }}" class="block px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-white/5">About</a>
                <a href="{{ route('contact.show') }}" class="block mt-2 px-4 py-3 rounded-lg text-center font-semibold bg-gradient-to-r from-indigo-500 to-violet-600 text-white">Get in Touch</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900/50 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Company Info -->
                <div class="lg:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold gradient-text">LuminaScott</span>
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        {{ $settings['site_description'] ?? 'Pioneering AI implementation for forward-thinking businesses.' }}
                    </p>
                    <!-- Social Links -->
                    <div class="flex space-x-3">
                        @if(!empty($settings['linkedin']))
                        <a href="{{ $settings['linkedin'] }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-indigo-500/20 flex items-center justify-center text-slate-400 hover:text-indigo-400 transition-all duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        @endif
                        @if(!empty($settings['twitter']))
                        <a href="{{ $settings['twitter'] }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-indigo-500/20 flex items-center justify-center text-slate-400 hover:text-indigo-400 transition-all duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        @endif
                        @if(!empty($settings['facebook']))
                        <a href="{{ $settings['facebook'] }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-indigo-500/20 flex items-center justify-center text-slate-400 hover:text-indigo-400 transition-all duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        @endif
                        @if(!empty($settings['instagram']))
                        <a href="{{ $settings['instagram'] }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-indigo-500/20 flex items-center justify-center text-slate-400 hover:text-indigo-400 transition-all duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C16.67.014 16.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-6">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">Home</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">Services</a></li>
                        <li><a href="{{ route('portfolio.index') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">Portfolio</a></li>
                        <li><a href="{{ url('/page/about') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">About Us</a></li>
                        <li><a href="{{ route('contact.show') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">Contact</a></li>
                        <li><a href="{{ url('/page/privacy-policy') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-6">Services</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/services/ai-strategy-consulting') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">AI Strategy & Consulting</a></li>
                        <li><a href="{{ url('/services/machine-learning-solutions') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">Machine Learning Solutions</a></li>
                        <li><a href="{{ url('/services/ai-integration-automation') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">AI Integration & Automation</a></li>
                        <li><a href="{{ url('/services/data-analytics-business-intelligence') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">Data Analytics</a></li>
                        <li><a href="{{ url('/services/ai-training-workshops') }}" class="text-slate-400 hover:text-indigo-400 text-sm transition-colors duration-200">AI Training & Workshops</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-6">Contact Us</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-indigo-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-slate-400 text-sm">{{ $settings['contact_address'] ?? '71-75 Shelton Street, Covent Garden, London, WC2H 9JQ' }}</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-indigo-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-slate-400 text-sm">{{ $settings['contact_phone'] ?? '+44 20 7946 0958' }}</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-indigo-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span class="text-slate-400 text-sm">{{ $settings['contact_email'] ?? 'hello@luminascott.com' }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-12 pt-8 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between">
                <p class="text-slate-500 text-sm">&copy; {{ date('Y') }} LuminaScott. All rights reserved.</p>
                <p class="text-slate-600 text-xs mt-2 sm:mt-0">Pioneering AI Implementation for Forward-Thinking Businesses</p>
            </div>
        </div>
    </footer>

</body>
</html>
