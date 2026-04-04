@extends('layouts.admin')

@section('main_content')
<div class="max-w-7xl mx-auto px-4 md:px-0 py-4">
    
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#2D2A5E]">Sifarişin detalları</h2>
        <a href="{{ route('admin.orders') }}"
            class="px-4 py-2 flex items-center gap-2 text-sm font-bold border !no-underline border-[#2D2A5E] text-[#2D2A5E] rounded-md hover:bg-[#2D2A5E] hover:text-white transition-all">
            <i class="fas fa-arrow-left"></i> Sifarişlərə qayıt
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden border border-gray-100">
                
                <div class="bg-[#2D2A5E] px-6 py-4 flex justify-between items-center">
                    <h3 class="text-white font-bold uppercase tracking-wider">Sifariş #{{ $order->order_number }}</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left whitespace-nowrap">
                        <thead class="bg-gray-50 border-b border-gray-100 text-[#2D2A5E] uppercase text-xs font-bold">
                            <tr>
                                <th class="px-6 py-4 tracking-wider">Məhsul</th>
                                <th class="px-6 py-4 tracking-wider">Qiymət</th>
                                <th class="px-6 py-4 tracking-wider">Miqdar</th>
                                <th class="px-6 py-4 tracking-wider text-right">Cəmi</th>
                            </tr>
                        </thead>
                        
                        <tbody class="divide-y divide-gray-100">
                            @foreach($order->items as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('uploads/products/' . $item->product->image) }}" class="w-12 h-12 object-cover rounded-md border border-gray-200 shadow-sm">
                                        <span class="font-bold text-gray-800">{{ $item->product->title }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-700">
                                    {{ number_format($item->price, 2) }} AZN
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-600">
                                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">x {{ $item->quantity }}</span>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-[#2D2A5E]">
                                    {{ number_format($item->price * $item->quantity, 2) }} AZN
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                        <tfoot class="border-t-2 border-gray-100 bg-gray-50">
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-right font-semibold text-gray-600">Çatdırılma:</td>
                                <td class="px-6 py-3 text-right font-bold text-gray-800">{{ number_format($order->shipping_price, 2) }} AZN</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-right font-bold text-lg text-[#2D2A5E]">Yekun:</td>
                                <td class="px-6 py-4 text-right font-black text-xl text-green-600">{{ number_format($order->total_price, 2) }} AZN</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-6">
            
            <div class="bg-white shadow-xl rounded-lg overflow-hidden border border-gray-100">
                <div class="bg-[#2D2A5E] px-6 py-4">
                    <h3 class="text-white font-bold uppercase tracking-wider text-sm">Müştəri Detalları</h3>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex flex-col">
                        <span class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Ad, Soyad</span>
                        <span class="text-gray-800 font-semibold">{{ $order->full_name }}</span>
                    </div>
                    <hr class="border-gray-100">
                    <div class="flex flex-col">
                        <span class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Əlaqə Nömrəsi</span>
                        <span class="text-gray-800 font-semibold">{{ $order->phone }}</span>
                    </div>
                    <hr class="border-gray-100">
                    <div class="flex flex-col">
                        <span class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Çatdırılma Ünvanı</span>
                        <span class="text-gray-800 font-semibold">{{ $order->address }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-xl rounded-lg overflow-hidden border border-gray-100">
                <div class="bg-[#2D2A5E] px-6 py-4">
                    <h3 class="text-white font-bold uppercase tracking-wider text-sm">Sifariş Statusu</h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Statusu dəyişdir</label>
                            <select name="status" class="w-full px-4 py-3 rounded-md border border-gray-200 bg-white focus:border-[#2D2A5E] focus:ring-1 focus:ring-[#2D2A5E] outline-none transition cursor-pointer">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Gözləmədə</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Hazırlanır (Paketləmə)</option>
                                <option value="on_shipping" {{ $order->status == 'on_shipping' ? 'selected' : '' }}>Kuryerdə (Yolda)</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Ləğv edildi</option>
                                <option value="returned" {{ $order->status == 'returned' ? 'selected' : '' }}>Geri qaytarıldı</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-[#2D2A5E] hover:bg-black text-white px-6 py-3 rounded-md font-bold transition-all shadow-md active:scale-95 flex justify-center items-center gap-2">
                            <i class="fas fa-sync-alt"></i> Statusu Yenilə
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
