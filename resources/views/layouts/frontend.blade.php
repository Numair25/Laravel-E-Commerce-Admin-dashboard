<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'E-commerce - Premium Cycles & Fashions in Gulbarga, Karnataka')</title>
        <meta name="description" content="@yield('description', 'Discover premium cycles and readymade fashions at E-commerce in Gulbarga, Karnataka. We offer a wide range of cycles and clothes for all ages.')">

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="@yield('og_title', 'E-commerce - Premium Cycles & Fashions in Gulbarga, Karnataka')">
        <meta property="og:description" content="@yield('og_description', 'Discover premium cycles and readymade fashions at E-commerce in Gulbarga, Karnataka. We offer a wide range of cycles and clothes for all ages.')">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ request()->url() }}">
        <meta property="og:image" content="@yield('og_image', asset('images/max-cycles-og.jpg'))">

        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('twitter_title', 'E-commerce - Premium Cycles & Fashions in Gulbarga, Karnataka')">
        <meta name="twitter:description" content="@yield('twitter_description', 'Discover premium cycles and readymade fashions at E-commerce in Gulbarga, Karnataka.')">
        <meta name="twitter:image" content="@yield('twitter_image', asset('images/max-cycles-og.jpg'))">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50">
            <!-- Navigation -->
            <nav class="bg-white shadow-lg">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                                    E-commerce
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                                <a href="{{ route('home') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Home
                                </a>
                                <a href="{{ route('cycles.index') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Browse Cycles
                                </a>
                                <a href="{{ route('fashions.index') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Browse Fashions
                                </a>
                                <a href="{{ route('about') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    About Us
                                </a>
                                <a href="{{ route('contact.index') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Contact
                                </a>
                            </div>
                        </div>

                        <div class="hidden sm:ml-6 sm:flex sm:items-center">
                            @auth
                                <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                    Admin
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                    Login
                                </a>
                            @endauth
                        </div>

                        <!-- Mobile menu button -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu -->
                <div class="sm:hidden" id="mobile-menu">
                    <div class="pt-2 pb-3 space-y-1">
                        <a href="{{ route('home') }}" class="bg-blue-50 border-blue-500 text-blue-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
                        <a href="{{ route('cycles.index') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Browse Cycles</a>
                        <a href="{{ route('fashions.index') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Browse Fashions</a>
                        <a href="{{ route('about') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">About Us</a>
                        <a href="{{ route('contact.index') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Contact</a>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                @if (session('success'))
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-gray-800">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="col-span-1 md:col-span-2">
                            <h3 class="text-white text-lg font-semibold mb-4">E-commerce</h3>
                            <p class="text-gray-300 mb-4">
                                Your trusted partner for premium cycles and readymade fashions in Gulbarga, Karnataka. We offer a wide range of cycles and clothes for all ages.
                            </p>
                            <div class="text-gray-300">
                                <p><strong>Address:</strong> Gulbarga, Karnataka, India</p>
                                <p><strong>Phone:</strong> +91 XXXXXXXXXX</p>
                                <p><strong>Email:</strong> info@maxstyles.com</p>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-white text-sm font-semibold mb-4">Quick Links</h4>
                            <ul class="space-y-2">
                                <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a></li>
                                <li><a href="{{ route('cycles.index') }}" class="text-gray-300 hover:text-white">Browse Cycles</a></li>
                                <li><a href="{{ route('fashions.index') }}" class="text-gray-300 hover:text-white">Browse Fashions</a></li>
                                <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">About Us</a></li>
                                <li><a href="{{ route('contact.index') }}" class="text-gray-300 hover:text-white">Contact</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-white text-sm font-semibold mb-4">Categories</h4>
                            <ul class="space-y-2">
                                <li><a href="{{ route('cycles.index', ['type' => 'Gear']) }}" class="text-gray-300 hover:text-white">Gear Cycles</a></li>
                                <li><a href="{{ route('cycles.index', ['type' => 'Non-Gear']) }}" class="text-gray-300 hover:text-white">Non-Gear Cycles</a></li>
                                <li><a href="{{ route('cycles.index', ['type' => 'Electric']) }}" class="text-gray-300 hover:text-white">Electric Cycles</a></li>
                                <li><a href="{{ route('cycles.index', ['type' => 'Kids']) }}" class="text-gray-300 hover:text-white">Kids Cycles</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-gray-700">
                        <p class="text-gray-300 text-center">
                            © {{ date('Y') }} E-commerce. All rights reserved.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
