<x-admin-layout>
    <div class="py-6">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900 mb-6">Edit Fashion</h1>
            <form method="POST" action="{{ route('admin.fashions.update', $fashion) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name', $fashion->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Description</label>
                    <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description', $fashion->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Price</label>
                    <input type="number" name="price" step="0.01" value="{{ old('price', $fashion->price) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Image URL</label>
                    <input type="text" name="image" value="{{ old('image', $fashion->image) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout> 