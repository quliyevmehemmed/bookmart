<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Kitabın Adı</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Müəllif</label>
        <input type="text" name="author" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kateqoriya</label>
        <select name="category_id" class="form-control" required>
            <option value="">Kateqoriya seçin</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Satış Qiyməti</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Köhnə Qiymət (Endirim üçün - boş qala bilər)</label>
            <input type="number" step="0.01" name="old_price" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label>Məhsulun Təsviri (Açıqlama)</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>

    <div class="mb-3">
        <label>Məhsul Şəkli</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Məhsulu Əlavə Et</button>
</form>