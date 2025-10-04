<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'E-commerce - Premium Cycles & Fashions in Gulbarga, Karnataka')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-950 text-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Amazon-style Header -->
        <header class="bg-gray-900 text-white">
            <!-- Top Row -->
            <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-2">
                <!-- Logo -->
                <a href="{{ route('home.index') }}" class="flex items-center gap-2 text-2xl font-bold text-yellow-400">
                    <svg class="w-8 h-8 text-yellow-400" fill="currentColor" viewBox="0 0 32 32"><ellipse cx="16" cy="16" rx="16" ry="16"/></svg>
                    E-commerce
                </a>
                <!-- Search Bar -->
                <form action="{{ route('search') }}" method="GET" class="flex-1 mx-8 max-w-2xl">
                    <div class="flex rounded overflow-hidden shadow bg-white">
                        <select name="category" class="bg-gray-200 text-gray-700 px-2 py-2 text-sm focus:outline-none">
                            <option value="">All</option>
                            <option value="cycles">Cycles</option>
                            <option value="fashions">Fashions</option>
                        </select>
                        <input type="text" name="q" placeholder="Search for products, brands and more..." class="flex-1 px-4 py-2 text-gray-900 focus:outline-none" value="{{ request('q') }}">
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 px-4 flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35"/></svg>
                        </button>
                    </div>
                </form>
                <!-- Account/Orders/Cart -->
                <div class="flex items-center gap-6">
                    <a href="#" class="flex flex-col items-center text-xs hover:text-yellow-400">
                        <span>Hello, sign in</span>
                        <span class="font-bold">Account & Lists</span>
                    </a>
                    <a href="#" class="flex flex-col items-center text-xs hover:text-yellow-400">
                        <span>Returns</span>
                        <span class="font-bold">& Orders</span>
                    </a>
                    <a href="#" class="relative flex items-center hover:text-yellow-400">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4"/><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/></svg>
                        <span class="absolute -top-2 -right-2 bg-yellow-400 text-gray-900 rounded-full px-2 text-xs font-bold">0</span>
                        <span class="ml-2 text-xs font-bold">Cart</span>
                    </a>
                </div>
            </div>
            <!-- Second Row: Category Links -->
            <nav class="bg-gray-800 text-gray-200 text-sm">
                <div class="max-w-7xl mx-auto flex items-center gap-4 px-4 py-1 overflow-x-auto">
                    <a href="#" class="flex items-center gap-1 px-2 py-1 hover:bg-gray-700 rounded"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>All</a>
                    <a href="#" class="px-2 py-1 hover:bg-gray-700 rounded">Fresh</a>
                    <a href="#" class="px-2 py-1 hover:bg-gray-700 rounded">Cycles</a>
                    <a href="#" class="px-2 py-1 hover:bg-gray-700 rounded">Fashions</a>
                    <a href="#" class="px-2 py-1 hover:bg-gray-700 rounded">Deals</a>
                    <a href="#" class="px-2 py-1 hover:bg-gray-700 rounded">Bestsellers</a>
                    <a href="#" class="px-2 py-1 hover:bg-gray-700 rounded">Kids</a>
                    <a href="#" class="px-2 py-1 hover:bg-gray-700 rounded">Electronics</a>
                    <a href="#" class="px-2 py-1 hover:bg-gray-700 rounded">Home & Kitchen</a>
                    <a href="#" class="px-2 py-1 hover:bg-gray-700 rounded">More</a>
                </div>
            </nav>
        </header>
        <main class="flex-1 bg-gray-950 text-gray-100">
            @yield('content')
            {{ $slot ?? '' }}
        </main>
        <footer class="bg-gray-900 border-t border-gray-800 mt-8">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                <span class="text-2xl font-bold text-white">E-commerce</span>
                <p class="text-gray-400 text-base">
                    &copy; {{ date('Y') }} E-commerce. All rights reserved. Gulbarga, Karnataka, India.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
