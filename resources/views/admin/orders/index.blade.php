@extends('layouts.admin')

@section('main_content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Sifarişlərin İdarə Edilməsi</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-500 text-white rounded-lg shadow p-4">
            <h6 class="text-sm opacity-90">Ümumi Sifarişlər</h6>
            <h3 class="text-2xl font-bold">{{ $orders->total() }}</h3>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">

                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Sifariş №</th>
                        <th class="px-6 py-3">Müştəri</th>
                        <th class="px-6 py-3">Məbləğ</th>
                        <th class="px-6 py-3">Tarix</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Əməliyyat</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach($orders as $order)

                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-4 font-semibold">
                            #{{ $order->order_number }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold">{{ $order->full_name }}</span>
                                <span class="text-gray-500 text-xs">{{ $order->phone }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            {{ number_format($order->total_price, 2) }} AZN
                        </td>

                        <td class="px-6 py-4">
                            {{ $order->created_at->format('d.m.Y H:i') }}
                        </td>

                        <td class="px-2 py-4">

                            @if($order->status == 'pending')
                            <span class="px-2 py-1 text-xs font-semibold bg-yellow-200 text-yellow-800 rounded">
                                Gözləmədə
                            </span>

                            @elseif($order->status == 'completed')
                            <span class="px-2 py-1 text-xs font-semibold bg-green-200 text-green-800 rounded">
                                Tamamlanıb
                            </span>

                            @else
                            <span class="px-2 py-1 text-xs font-semibold bg-red-200 text-red-800 rounded">
                                Ləğv edilib
                            </span>
                            @endif

                        </td>

                        <td class="px-6 py-4 text-right">

                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="px-2 py-1 flex gap-2 items-center text-sm border !no-underline border-blue-500 text-blue-500 rounded hover:bg-blue-500 hover:text-white transition">
                                    <i class="fas fa-eye"></i> Detal
                                </a>

                                <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Silmək istədiyinizə əminsiniz?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="px-3 py-1 border border-red-500 text-red-500 rounded hover:bg-red-500 hover:text-white transition">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>

        <div class="p-4 border-t">
            {{ $orders->links() }}
        </div>

    </div>

</div>
@endsection