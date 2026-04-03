@extends('layouts.app1')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12 flex flex-col md:flex-row gap-8 font-sans">
    <aside class="w-full md:w-1/4">
        <h2 class="text-xl font-bold border-b pb-4 mb-4 uppercase tracking-wider">Hesabim</h2>
        <nav class="flex flex-col space-y-1">
            <a href="{{ route('account') }}" class="hover:bg-gray-50 py-3 px-4 transition border-b border-gray-100">Hesabim</a>
            <a href="{{ route('account.orders') }}" class="bg-gray-100 py-3 px-4 font-medium">Sifarisler</a>
        </nav>
    </aside>

    <main class="w-full md:w-3/4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Sifarislerim</h1>
            <a href="{{ route('account') }}" class="text-sm underline">Hesaba qayit</a>
        </div>

        @if($orders->count() === 0)
            <div class="border border-gray-200 rounded-md p-6 text-gray-600">
                Hec bir sifaris tapilmadi.
            </div>
        @else
            <div class="overflow-x-auto border border-gray-200 rounded-md">
                <table class="w-full text-left min-w-[700px]">
                    <thead class="bg-gray-50 text-sm">
                        <tr>
                            <th class="px-4 py-3">Sifaris No</th>
                            <th class="px-4 py-3">Tarix</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Mehsul sayi</th>
                            <th class="px-4 py-3 text-right">Mebleg</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @foreach($orders as $order)
                            @php
                                $statusMap = [
                                    'pending' => ['label' => 'Gozlemede', 'class' => 'bg-yellow-100 text-yellow-800'],
                                    'processing' => ['label' => 'Hazirlanir', 'class' => 'bg-blue-100 text-blue-800'],
                                    'on_shipping' => ['label' => 'Yoldadir', 'class' => 'bg-indigo-100 text-indigo-800'],
                                    'completed' => ['label' => 'Tamamlandi', 'class' => 'bg-green-100 text-green-800'],
                                    'cancelled' => ['label' => 'Legv edildi', 'class' => 'bg-red-100 text-red-800'],
                                    'returned' => ['label' => 'Qaytarilib', 'class' => 'bg-gray-100 text-gray-800'],
                                ];
                                $statusInfo = $statusMap[$order->status] ?? ['label' => $order->status, 'class' => 'bg-gray-100 text-gray-800'];
                            @endphp
                            <tr>
                                <td class="px-4 py-3 font-semibold">{{ $order->order_number }}</td>
                                <td class="px-4 py-3">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold {{ $statusInfo['class'] }}">
                                        {{ $statusInfo['label'] }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">{{ $order->items_count }}</td>
                                <td class="px-4 py-3 text-right font-semibold">{{ number_format($order->total_price, 2) }} AZN</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $orders->links() }}
            </div>
        @endif
    </main>
</div>
@endsection
