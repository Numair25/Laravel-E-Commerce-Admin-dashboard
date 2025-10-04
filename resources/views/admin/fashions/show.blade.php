<x-admin-layout>
    <div class="py-6">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900 mb-6">Fashion Details</h1>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Name:</label>
                <div>{{ $fashion->name }}</div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Description:</label>
                <div>{{ $fashion->description }}</div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Price:</label>
                <div>{{ number_format($fashion->price, 2) }}</div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Image:</label>
                @if($fashion->image)
                    <img src="{{ $fashion->image }}" alt="{{ $fashion->name }}" class="h-32 w-32 object-cover rounded">
                @else
                    <span>No image</span>
                @endif
            </div>
            <div class="flex justify-end">
                <a href="{{ route('admin.fashions.edit', $fashion) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                <form method="POST" action="{{ route('admin.fashions.destroy', $fashion) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this fashion?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout> 