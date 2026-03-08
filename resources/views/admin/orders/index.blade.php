@extends('layouts.admin')

@section('main_content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4">Sifarişlərin İdarə Edilməsi</h2>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white shadow-sm">
                <div class="card-body">
                    <h6>Ümumi Sifarişlər</h6>
                    <h3>{{ $orders->total() }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="ps-4">Sifariş №</th>
                            <th>Müştəri</th>
                            <th>Məbləğ</th>
                            <th>Tarix</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Əməliyyat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="ps-4 font-weight-bold">#{{ $order->order_number }}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">{{ $order->full_name }}</span>
                                    <small class="text-muted">{{ $order->phone }}</small>
                                </div>
                            </td>
                            <td>{{ number_format($order->total_price, 2) }} AZN</td>
                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                @if($order->status == 'pending')
                                <span class="badge bg-warning text-dark">Gözləmədə</span>
                                @elseif($order->status == 'completed')
                                <span class="badge bg-success">Tamamlanıb</span>
                                @else
                                <span class="badge bg-danger">Ləğv edilib</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary" title="Sifarişə bax">
                                        <i class="fas fa-eye"></i> Detal
                                    </a>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Silmək istədiyinizə əminsiniz?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white text-danger border" title="Sil">
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
        </div>
        <div class="card-footer bg-white border-0 py-3">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection