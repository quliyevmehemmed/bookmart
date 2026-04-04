@extends('layouts.app1') @section('content')
<div class="font-poppins container mx-auto px-4 py-10">
    <div class="flex flex-col lg:flex-row gap-10">

        <div class="w-full lg:w-2/3">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[600px]">
                    <thead>
                        <tr class="border-b text-sm font-bold tracking-wide uppercase text-gray-700">
                            <th class="pb-4 w-10"></th>
                            <th class="pb-4 w-20"></th>
                            <th class="pb-4">Məhsul</th>
                            <th class="pb-4">Qiymət</th>
                            <th class="pb-4 text-center">Say</th>
                            <th class="pb-4 text-right">Cəmi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $umumiMebleg = 0; @endphp

                        @forelse(session('card', []) as $id => $details)
                        @php
                        $mebleg = $details['price'] * $details['quantity'];
                        $umumiMebleg += $mebleg;
                        @endphp
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 text-center">
                                <button class="remove-from-cart text-red-500" data-id="{{ $id }}" data-url="{{ route('card.remove', $id) }}">
                                    <i class="fa-solid fa-trash"></i> </button>
                            </td>

                            <td class="py-4">
                                <img src="{{ asset('uploads/products/' . $details['image']) }}" alt="{{ $details['title'] }}" class="w-16 h-20 object-cover border border-gray-200 p-1">
                            </td>

                            <td class="py-4 text-sm font-medium text-gray-800 pr-4">
                                {{ $details['title'] }}
                            </td>

                            <td class="py-4 text-sm text-gray-600">
                                {{ $details['price'] }} ₼
                            </td>

                            <td class="py-4">
                                <div class="flex items-center justify-center border border-gray-200 w-max mx-auto bg-white">
                                    <button class="quantity-btn minus px-3 py-1">-</button>

                                    <input type="text"
                                        value="{{ $details['quantity'] }}"
                                        class="quantity-input w-10 text-center"
                                        data-id="{{ $id }}"
                                        readonly>

                                    <button class="quantity-btn plus px-3 py-1">+</button>
                                </div>
                            </td>

                            <td id="subtotal-{{ $id }}" class="py-4 text-right text-sm font-bold text-gray-800">
                                {{ $mebleg }} ₼
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-gray-500 font-medium text-lg">
                                Səbətiniz hal-hazırda boşdur.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(count(session('card', [])) > 0)
            <div class="flex justify-end mt-6">
                <button class="bg-gray-50 border border-gray-200 text-gray-600 px-6 py-2.5 text-xs font-bold tracking-widest uppercase hover:bg-gray-100 transition-colors">
                    SƏBƏTİ YENİLƏ
                </button>
            </div>
            @endif
        </div>

        <div class="w-full lg:w-1/3">
            <div class="border border-gray-200 p-6 md:p-8 rounded-sm bg-white shadow-sm">
                <h2 class="text-xl font-bold mb-6 text-gray-800 uppercase">ÜMUMİ SƏBƏT</h2>

                <div class="flex justify-between border-b border-gray-200 pb-4 mb-4">
                    <span class="font-bold text-gray-700">Cəmi</span>
                    <span id="grand-total" class="text-gray-700">{{ $umumiMebleg }} ₼</span>
                </div>

                <div class="flex flex-col md:flex-row justify-between border-b border-gray-200 pb-6 mb-6">
                    <span class="font-bold text-gray-700 mb-3 md:mb-0 w-1/3">Çatdırılma</span>

                    <div class="w-full md:w-2/3 text-right text-sm text-gray-600 flex flex-col gap-3">
                        <label class="flex items-center justify-end gap-3 cursor-pointer group">
                            <span class="font-sans group-hover:text-black transition-colors">Pulsuz Çatdırılma (Bakı daxilində)</span>
                            <input type="radio" name="shipping" value="0"
                                class="shipping-select w-4 h-4 text-[#2D2A5E] focus:ring-[#2D2A5E] border-gray-300"
                                data-method="Pulsuz Çatdırılma (Bakı daxilində)" data-price="0" checked>
                        </label>

                        <label class="flex items-center justify-end gap-3 cursor-pointer group">
                            <span class="font-sans group-hover:text-black transition-colors text-right">Rayonlara poçtla (50 manata qədər): 7 ₼</span>
                            <input type="radio" name="shipping" value="7"
                                class="shipping-select w-4 h-4 text-[#2D2A5E] focus:ring-[#2D2A5E] border-gray-300"
                                data-method="Rayonlara poçtla (50 manata qədər)" data-price="7">
                        </label>

                        <label class="flex items-center justify-end gap-3 cursor-pointer group">
                            <span class="font-sans group-hover:text-black transition-colors">Metrolara pulsuz çatdırılma</span>
                            <input type="radio" name="shipping" value="0"
                                class="shipping-select w-4 h-4 text-[#2D2A5E] focus:ring-[#2D2A5E] border-gray-300"
                                data-method="Metrolara pulsuz çatdırılma" data-price="0">
                        </label>
                    </div>
                </div>

                <div class="flex justify-between items-center mb-8">
                    <span class="font-bold text-lg text-gray-800">Ümumi</span>
                    <span id="final-total" class="font-bold text-2xl text-[#2D2A5E]">{{ $umumiMebleg }} ₼</span>
                </div>

                <a href="{{ route('checkout.index')}}">
                    <button class="w-full bg-color-brand text-white py-4 font-bold tracking-widest text-xs uppercase hover:bg-black transition-colors rounded-sm">
                        SİFARİŞİ TAMAMLA
                    </button>
                </a>
            </div>
        </div>

    </div>
</div>
@push('scripts')
<script>
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const grandTotalEl = document.getElementById('grand-total');
    const finalTotalEl = document.getElementById('final-total');

    function parseMoney(value) {
        if (!value) return 0;
        const cleaned = String(value).replace(/[^\d,.-]/g, '').replace(',', '.');
        const parsed = parseFloat(cleaned);
        return Number.isNaN(parsed) ? 0 : parsed;
    }

    function formatMoney(value) {
        const amount = parseMoney(value);
        const normalized = Number.isInteger(amount) ? amount.toString() : amount.toFixed(2);
        return normalized + ' ₼';
    }

    function getSelectedShippingPrice() {
        const checked = document.querySelector('.shipping-select:checked');
        return checked ? parseMoney(checked.dataset.price) : 0;
    }

    function refreshFinalTotal() {
        if (!grandTotalEl || !finalTotalEl) return;
        const subtotal = parseMoney(grandTotalEl.textContent);
        const shippingPrice = getSelectedShippingPrice();
        finalTotalEl.textContent = formatMoney(subtotal + shippingPrice);
    }

    document.querySelectorAll('.shipping-select').forEach(radio => {
        radio.addEventListener('change', function() {
            const method = this.dataset.method;
            const price = this.dataset.price;

            fetch("{{ route('basket.updateShipping') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        method,
                        price
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        refreshFinalTotal();
                    }
                });
        });
    });

    // Səhifə ilk dəfə açılanda default seçili olanı sessiyaya yazmaq üçün:
    window.addEventListener('load', () => {
        const checkedRadio = document.querySelector('.shipping-select:checked');
        if (checkedRadio) {
            checkedRadio.dispatchEvent(new Event('change'));
        } else {
            refreshFinalTotal();
        }
    });


    // Sayı artırıb-azaltmaq (Quantity)
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.quantity-btn');
        if (!btn) return;
        const row = btn.closest('tr') || btn.closest('.flex');
        const input = row.querySelector('.quantity-input');
        let currentQty = parseInt(input.value);

        if (btn.classList.contains('plus')) currentQty++;
        else if (btn.classList.contains('minus') && currentQty > 1) currentQty--;

        input.value = currentQty;
        updateCart(input.dataset.id, currentQty);
    });

    // Serverdə səbəti yeniləmək
    async function updateCart(id, qty) {
        const response = await fetch("{{ route('card.update') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id,
                quantity: qty
            })
        });
        const data = await response.json();
        if (data.status === 'success') {
            document.getElementById(`subtotal-${id}`).textContent = data.subtotal;
            document.getElementById('grand-total').textContent = data.grand_total;
            if (document.getElementById('header-total')) document.getElementById('header-total').textContent = data.grand_total;
            refreshFinalTotal();
        }
    }

    // Səbətdən silmək
    document.addEventListener('click', async (e) => {
        const removeBtn = e.target.closest('.remove-from-cart');
        if (!removeBtn) return;
        const row = removeBtn.closest('tr');
        const response = await fetch(removeBtn.dataset.url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            }
        });
        const data = await response.json();
        if (data.status === 'success') {
            row.remove();
            const headerTotal = document.getElementById('header-total');
            if (headerTotal) headerTotal.textContent = data.grand_total;
            document.querySelectorAll('.cart-count').forEach(el => el.textContent = data.count);
            if (data.count === 0) location.reload();
            else {
                document.getElementById('grand-total').textContent = data.grand_total;
                refreshFinalTotal();
            }
        }
    });
</script>
@endpush
@endsection


