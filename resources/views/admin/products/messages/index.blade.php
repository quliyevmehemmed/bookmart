@extends('layouts.admin') {{-- Admin layout-una bağlayırıq --}}

@section('main_content') {{-- Layout-dakı yield-ə uyğun ad --}}
<div class="container">
    <h2>Gələn Sorğular</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Ad</th>
                <th>Email</th>
                <th>Növ</th>
                <th>Mesaj</th>
                <th>Tarix</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>
                    {{-- Növə görə fərqli rənglər (badge) --}}
                    @if($message->type == 'contact')
                    <span class="badge bg-primary">Əlaqə</span>
                    @elseif($message->type == 'print_book')
                    <span class="badge bg-success">Çap et</span>
                    @else
                    <span class="badge bg-warning">Satış</span>
                    @endif
                </td>
                <td>{{ Str::limit($message->message, 50) }}</td>
                <td>{{ $message->created_at->format('d.m.Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination (Səhifələmə) üçün --}}
    {{ $messages->links() }}
</div>
@endsection