@extends('layouts.admin')

@section('main_content')
<div class="container">
    <h2>Gələn Sorğular</h2>
    <form action="{{ route('admin.messages') }}" method="GET" class="mb-4 d-flex gap-2">
        <select name="type" class="form-select w-25">
            <option value="">Bütün müraciətlər</option>
            <option value="contact" {{ request('type') == 'contact' ? 'selected' : '' }}>Əlaqə</option>
            <option value="print_book" {{ request('type') == 'print_book' ? 'selected' : '' }}>Kitab Çapı</option>
            <option value="sell_book" {{ request('type') == 'sell_book' ? 'selected' : '' }}>Kitab Satışı</option>
        </select>
        <select name="status" class="form-select w-25">
            <option value="">Bütün statuslar</option>
            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Oxunmamış</option>
            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Oxunmuş</option>
        </select>
        <button type="submit" class="btn btn-primary">Filtrlə</button>
        <a href="{{ route('admin.messages') }}" class="btn btn-secondary">Təmizlə</a>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Ad</th>
                <th>Email</th>
                <th>Növ</th>
                <th>Mesaj</th>
                <th>Tarix</th>
                <th>Əməliyyatlar</th>
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
                    <span class="text-white  badge bg-primary">Əlaqə</span>
                    @elseif($message->type == 'print_book')
                    <span class="text-white badge bg-success">Çap et</span>
                    @else
                    <span class="text-white badge bg-warning">Satış</span>
                    @endif
                </td>
                <td>{{ Str::limit($message->message, 50) }}</td>
                <td>{{ $message->created_at->format('d.m.Y') }}</td>
                <td class="w-60">
                    <div class="flex justify-center ">
                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Silmək istədiyinizə əminsiniz?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                        </form>
                        @if(!$message->is_read)
                        <form action="{{ route('admin.messages.read', $message->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-success">Oxundu</button>
                        </form>
                        @else
                        <span class="text-muted"><i class="fa fa-check"></i> Oxunub</span>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination (Səhifələmə) üçün --}}
    {{ $messages->links() }}
</div>
@endsection