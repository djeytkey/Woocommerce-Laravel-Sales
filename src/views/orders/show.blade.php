<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details #{{ $order->ID }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ route('woo-sales-report.sales.index') }}" 
               class="text-indigo-600 hover:text-indigo-900">← Back to Orders</a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h1 class="text-2xl font-bold">
                    Order #{{ $order->ID }}
                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $status === 'completed' ? 'bg-green-100 text-green-800' : 
                           ($status === 'processing' ? 'bg-blue-100 text-blue-800' : 
                           'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($status) }}
                    </span>
                </h1>
                <p class="text-gray-600">{{ $order->post_date }}</p>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Customer Information</h2>
                        <div class="space-y-2">
                            <p><span class="font-medium">Name:</span> {{ $customer['first_name'] }} {{ $customer['last_name'] }}</p>
                            <p><span class="font-medium">Email:</span> {{ $customer['email'] }}</p>
                            <p><span class="font-medium">Phone:</span> {{ $customer['phone'] }}</p>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold mb-4">Order Summary</h2>
                        <div class="space-y-2">
                            <p><span class="font-medium">Order Date:</span> {{ $order->post_date }}</p>
                            <p><span class="font-medium">Status:</span> {{ ucfirst($status) }}</p>
                            <p><span class="font-medium">Total Amount:</span> ${{ number_format($total, 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <h2 class="text-lg font-semibold mb-4">Order Items</h2>
                    <div class="bg-gray-50 rounded-lg p-4">
                        @php
                            $items = unserialize($order->getMeta('_order_items'));
                        @endphp
                        
                        @if(!empty($items))
                            <div class="space-y-4">
                                @foreach($items as $item)
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h3 class="font-medium">{{ $item['name'] }}</h3>
                                            <p class="text-sm text-gray-600">Quantity: {{ $item['qty'] }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-medium">${{ number_format($item['line_total'], 2) }}</p>
                                            <p class="text-sm text-gray-600">
                                                ${{ number_format($item['line_total'] / $item['qty'], 2) }} each
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-600">No items found in this order.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 