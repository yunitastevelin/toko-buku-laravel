<form method="GET">

    <input type="text" name="search" placeholder="Cari Produk">

    <button type="submit">
        Cari
    </button>

</form>

@foreach ($products as $product)
    <tr>

        <td>{{ $product->nama_produk }}</td>

        <td>{{ $product->category->nama_kategori }}</td>

        <td>{{ $product->harga }}</td>

        <td>{{ $product->stok }}</td>

        <td>

            <img src="{{ asset('storage/' . $product->gambar) }}" width="100">

        </td>

    </tr>
@endforeach

{{ $products->links() }}
