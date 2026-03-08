@extends('layouts.admin')

@section('main_content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Sifariş #{{ $order->order_number }}</h5>
                </div>
                <div class="card-body">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Məhsul</th>
                                <th>Qiymət</th>
                                <th>Miqdar</th>
                                <th class="text-end">Cəmi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $item->book->image) }}" width="50" class="rounded me-3">
                                        <span class="fw-bold">{{ $item->product->title }}</span>
                                    </div>
                                </td>
                                <td>{{ number_format($item->price, 2) }} AZN</td>
                                <td>x {{ $item->quantity }}</td>
                                <td class="text-end fw-bold">{{ number_format($item->price * $item->quantity, 2) }} AZN</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="border-top">
                            <tr>
                                <td colspan="3" class="text-end py-3">Çatdırılma:</td>
                                <td class="text-end py-3">{{ number_format($order->shipping_price, 2) }} AZN</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Yekun:</td>
                                <td class="text-end fw-bold text-primary fs-5">{{ number_format($order->total_price, 2) }} AZN</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Müştəri Detalları</h5>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>Ad:</strong> {{ $order->full_name }}</p>
                    <p class="mb-1"><strong>Tel:</strong> {{ $order->phone }}</p>
                    <p class="mb-3"><strong>Ünvan:</strong> {{ $order->address }}</p>
                    <hr>

                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <label class="form-label fw-bold">Sifariş Statusu</label>
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select mb-3">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Gözləmədə</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Hazırlanır (Paketləmə)</option>
                            <option value="on_shipping" {{ $order->status == 'on_shipping' ? 'selected' : '' }}>Kuryerdə (Yolda)</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Ləğv edildi</option>
                            <option value="returned" {{ $order->status == 'returned' ? 'selected' : '' }}>Geri qaytarıldı</option>
                        </select>
                        <button type="submit" class="btn btn-primary w-100">Yenilə</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection