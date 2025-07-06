<x-admin-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-900">Payment Gateways</h1>
                <a href="{{ route('admin.payment-gateways.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Add Payment Gateway
                </a>
            </div>

            @if(session('success'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mt-6 bg-white shadow overflow-hidden sm:rounded-md">
                @if($paymentGateways->count() > 0)
                    <ul class="divide-y divide-gray-200">
                        @foreach($paymentGateways as $gateway)
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="flex items-center">
                                                    <p class="text-sm font-medium text-gray-900">{{ $gateway->name }}</p>
                                                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $gateway->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                        {{ $gateway->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </div>
                                                <p class="text-sm text-gray-500 mt-1">API Key: {{ Str::limit($gateway->api_key, 20) }}...</p>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.payment-gateways.show', $gateway) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                                View
                                            </a>
                                            <a href="{{ route('admin.payment-gateways.edit', $gateway) }}" class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.payment-gateways.destroy', $gateway) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this payment gateway?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="px-4 py-8 text-center">
                        <p class="text-gray-500">No payment gateways found.</p>
                        <a href="{{ route('admin.payment-gateways.create') }}" class="mt-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                            Add your first payment gateway
                        </a>
                    </div>
                @endif
            </div>

            @if($paymentGateways->hasPages())
                <div class="mt-6">
                    {{ $paymentGateways->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout> 