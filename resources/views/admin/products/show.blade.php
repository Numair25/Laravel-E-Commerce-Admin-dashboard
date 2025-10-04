<x-admin-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">{{ $product->name }}</h1>
            <div class="mt-6 bg-white shadow sm:rounded-lg p-6">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <div class="text-sm font-medium text-gray-900">Brand</div>
                        <div class="text-sm text-gray-500">{{ $product->brand }}</div>
                    </div>
                    <div>
                        <div class="text-sm font-medium text-gray-900">Price</div>
                        <div class="text-sm text-gray-500">₹{{ number_format($product->price) }}</div>
                    </div>
                    <div>
                        <div class="text-sm font-medium text-gray-900">Category</div>
                        <div class="text-sm text-gray-500">{{ $product->category->name }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
