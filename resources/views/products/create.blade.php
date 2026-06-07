<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <select name="category_id">

        @foreach ($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->nama_kategori }}
            </option>
        @endforeach

    </select>

    <input type="text" name="nama_produk">

    <input type="number" name="harga">

    <input type="number" name="stok">

    <input type="file" name="gambar">

    <button type="submit">
        Simpan
    </button>

</form>
