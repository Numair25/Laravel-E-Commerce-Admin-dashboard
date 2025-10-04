@extends('components.frontend-layout')

@section('title', 'Search Results - E-commerce')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Search Results for "{{ $query }}"</h1>
    @if($cycles->isEmpty() && $fashions->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-6">No results found.</div>
    @endif
    @if(!$cycles->isEmpty())
        <h2 class="text-xl font-semibold mt-6 mb-2">Cycles</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($cycles as $cycle)
                <a href="{{ route('cycles.show', $cycle) }}" class="block bg-white rounded shadow hover:shadow-lg p-4">
                    <div class="flex flex-col items-center">
                        @if($cycle->getFirstMediaUrl('images'))
                            <img src="{{ $cycle->getFirstMediaUrl('images') }}" class="h-32 w-32 object-cover rounded mb-2" alt="{{ $cycle->name }}">
                        @else
                            <img src="/storage/download.jfif" class="h-32 w-32 object-cover rounded mb-2" alt="{{ $cycle->name }}">
                        @endif
                        <div class="font-bold text-blue-700">{{ $cycle->name }}</div>
                        <div class="text-gray-500 text-sm">{{ $cycle->brand }}</div>
                        <div class="text-lg font-bold text-blue-600 mt-1">₹{{ number_format($cycle->price) }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
    @if(!$fashions->isEmpty())
        <h2 class="text-xl font-semibold mt-8 mb-2">Fashions</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($fashions as $fashion)
                <a href="{{ route('fashions.show', $fashion) }}" class="block bg-white rounded shadow hover:shadow-lg p-4">
                    <div class="flex flex-col items-center">
                        @if($fashion->image)
                            <img src="{{ $fashion->image }}" class="h-32 w-32 object-cover rounded mb-2" alt="{{ $fashion->name }}">
                        @else
                            <img src="/storage/download.jfif" class="h-32 w-32 object-cover rounded mb-2" alt="{{ $fashion->name }}">
                        @endif
                        <div class="font-bold text-pink-600">{{ $fashion->name }}</div>
                        <div class="text-lg font-bold text-pink-500 mt-1">₹{{ number_format($fashion->price) }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
