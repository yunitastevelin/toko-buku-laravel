<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'required|image'
        ]);

        $gambar = $request->file('gambar')
        ->store('products', 'public');

        Product::create([
            'category_id' => $request->category_id,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambar
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();

        return view('products.edit', compact(
            'product',
            'categories'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer'
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
            ->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
