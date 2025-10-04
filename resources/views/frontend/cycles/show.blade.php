<x-frontend-layout>
    @section('title', $cycle->meta_title ?: $cycle->name . ' - Cycles')
    @section('description', $cycle->meta_description ?: $cycle->description)
    @section('og_title', $cycle->name . ' - Cycles')
    @section('og_description', $cycle->description)

    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                <!-- Image gallery -->
                <div class="flex flex-col">
                    <div class="w-full">
                        @if($cycle->getFirstMediaUrl('images'))
                            <img id="mainImage" src="{{ $cycle->getFirstMediaUrl('images') }}" alt="{{ $cycle->name }}" class="w-full h-96 object-center object-cover rounded-lg">
                        @else
                            <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    @if($cycle->getMedia('images')->count() > 1)
                        <div class="mt-4 grid grid-cols-4 gap-2">
                            @foreach($cycle->getMedia('images') as $image)
                                <button onclick="changeImage('{{ $image->getUrl() }}')" class="w-full h-20 bg-gray-200 rounded-lg overflow-hidden">
                                    <img src="{{ $image->getUrl() }}" alt="{{ $cycle->name }}" class="w-full h-full object-center object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Product info -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $cycle->name }}</h1>

                    <div class="mt-3">
                        <h2 class="sr-only">Product information</h2>
                        <p class="text-3xl text-gray-900">₹{{ number_format($cycle->price) }}</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="sr-only">Description</h3>
                        <div class="text-base text-gray-700 space-y-6">
                            <p>{{ $cycle->description }}</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="flex items-center">
                            <h3 class="text-sm font-medium text-gray-900">Category:</h3>
                            <p class="ml-2 text-sm text-gray-500">{{ $cycle->category->name }}</p>
                        </div>

                        <div class="flex items-center mt-2">
                            <h3 class="text-sm font-medium text-gray-900">Brand:</h3>
                            <p class="ml-2 text-sm text-gray-500">{{ $cycle->brand }}</p>
                        </div>

                        <div class="flex items-center mt-2">
                            <h3 class="text-sm font-medium text-gray-900">Type:</h3>
                            <p class="ml-2 text-sm text-gray-500">{{ $cycle->type }}</p>
                        </div>

                        <div class="flex items-center mt-2">
                            <h3 class="text-sm font-medium text-gray-900">Stock Status:</h3>
                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $cycle->stock_status === 'In Stock' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $cycle->stock_status }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('contact.index') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md">
                            Inquire About This Cycle
                        </a>
                    </div>
                </div>
            </div>

            <!-- Specifications -->
            @if($cycle->specifications)
                <div class="mt-16 border-t border-gray-200 pt-10">
                    <h3 class="text-lg font-medium text-gray-900">Specifications</h3>
                    <div class="mt-4 prose prose-sm text-gray-500">
                        {!! nl2br(e($cycle->specifications)) !!}
                    </div>
                </div>
            @endif

            <!-- Related Cycles -->
            @if($relatedCycles->count() > 0)
                <div class="mt-16 border-t border-gray-200 pt-10">
                    <h3 class="text-lg font-medium text-gray-900">Related Cycles</h3>
                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @foreach($relatedCycles as $relatedCycle)
                            <div class="group relative">
                                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                    @if($relatedCycle->getFirstMediaUrl('images'))
                                        <img src="{{ $relatedCycle->getFirstMediaUrl('images') }}" alt="{{ $relatedCycle->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                            <svg class="h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <a href="{{ route('cycles.show', $relatedCycle) }}">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ $relatedCycle->name }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $relatedCycle->brand }}</p>
                                        <p class="mt-1 text-sm text-gray-500">{{ $relatedCycle->category->name }}</p>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">₹{{ number_format($relatedCycle->price) }}</p>
                                </div>
                                <div class="mt-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $relatedCycle->stock_status === 'In Stock' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $relatedCycle->stock_status }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>
</x-frontend-layout>
