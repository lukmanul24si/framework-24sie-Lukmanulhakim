<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * (index) Menampilkan daftar produk
     * * PERBAIKAN: Menggunakan view 'admin.products.index'
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        // Menggunakan path view admin yang benar
        return view('admin.products.index', compact('products'));
    }

    /**
     * (create) Menampilkan form tambah produk
     *
     * PERBAIKAN: Menggunakan view 'admin.products.create'
     */
    public function create(): View
    {
        // Menggunakan path view admin yang benar
        return view('admin.products.create');
    }

    /**
     * (store) Menyimpan produk ke database
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'name'  => 'required|string|min:3',
            'price' => 'required|integer'
        ]);

        // Buat produk baru
        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description
        ]);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
         // Anda bisa buat view 'admin.products.show' jika perlu
        return view('admin.products.show', compact('product'));
    }

    /**
     * (edit) Menampilkan form edit produk
     *
     * PERBAIKAN: Menggunakan view 'admin.products.edit'
     */
    public function edit(Product $product): View
    {
        // Menggunakan path view admin yang benar
        return view('admin.products.edit', compact('product'));
    }

    /**
     * (update) Update produk
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'name'  => 'required|string|min:3',
            'price' => 'required|integer'
        ]);

        // Update produk
        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description
        ]);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * (destroy) Hapus produk
     */
    public function destroy(Product $product): RedirectResponse
    {
        // Hapus produk
        $product->delete();

        // Redirect ke index dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}
