<x-admin-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-900">Cycles</h1>
                <a href="{{ route('admin.cycles.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add New Cycle
                </a>
            </div>

            <div class="mt-6 bg-white shadow overflow-hidden sm:rounded-md">
                @if($cycles->count() > 0)
                    <ul class="divide-y divide-gray-200">
                        @foreach($cycles as $cycle)
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-16 w-16">
                                                @if($cycle->getFirstMediaUrl('images'))
                                                    <img class="h-16 w-16 rounded-lg object-cover" src="{{ $cycle->getFirstMediaUrl('images') }}" alt="{{ $cycle->name }}">
                                                @else
                                                    <div class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center">
                                                        <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $cycle->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $cycle->brand }} • {{ $cycle->type }}</div>
                                                <div class="text-sm text-gray-500">{{ $cycle->category->name }}</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <div class="text-right">
                                                <div class="text-sm font-medium text-gray-900">₹{{ number_format($cycle->price) }}</div>
                                                <div class="text-sm text-gray-500">{{ $cycle->stock_status }}</div>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $cycle->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $cycle->is_published ? 'Published' : 'Draft' }}
                                                </span>
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.cycles.show', $cycle) }}" class="text-blue-600 hover:text-blue-900 text-sm">View</a>
                                                    <a href="{{ route('admin.cycles.edit', $cycle) }}" class="text-indigo-600 hover:text-indigo-900 text-sm">Edit</a>
                                                    <form method="POST" action="{{ route('admin.cycles.toggle-publish', $cycle) }}" class="inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="text-yellow-600 hover:text-yellow-900 text-sm">
                                                            {{ $cycle->is_published ? 'Unpublish' : 'Publish' }}
                                                        </button>
                                                    </form>
                                                    <form method="POST" action="{{ route('admin.cycles.destroy', $cycle) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this cycle?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No cycles</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new cycle.</p>
                        <div class="mt-6">
                            <a href="{{ route('admin.cycles.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Add New Cycle
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            @if($cycles->hasPages())
                <div class="mt-6">
                    {{ $cycles->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout> 