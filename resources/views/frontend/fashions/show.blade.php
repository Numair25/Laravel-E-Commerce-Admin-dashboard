<x-frontend-layout>
    <div class="bg-white py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="flex flex-col items-center">
                @if($fashion->image)
                    <img src="{{ $fashion->image }}" alt="{{ $fashion->name }}" class="h-64 w-64 object-cover rounded mb-6">
                @endif
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">{{ $fashion->name }}</h1>
                <div class="text-lg text-gray-700 mb-4">{{ $fashion->description }}</div>
                <div class="text-2xl font-bold text-blue-600 mb-4">{{ number_format($fashion->price, 2) }}</div>
            </div>
        </div>
    </div>
</x-frontend-layout> 