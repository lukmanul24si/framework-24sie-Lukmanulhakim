@extends('layouts.admin.app')

@section('content')
<div class="py-4">
<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
<li class="breadcrumb-item">
<a href="{{ route('admin.dashboard') }}"> <!-- Asumsi route dashboard -->
<svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
</svg>
</a>
</li>
<li class="breadcrumb-item"><a href="#">Produk</a></li>
<li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
</ol>
</nav>
<div class="d-flex justify-content-between w-100 flex-wrap">
<div class="mb-3 mb-lg-0">
<h1 class="h4">Daftar Produk</h1>
<p class="mb-0">Menampilkan semua data produk yang tersimpan.</p>
</div>
<div>
<a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Tambah Produk</a>
</div>
</div>
</div>

<!-- Menampilkan Pesan Sukses -->
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">ID</th>
                        <th class="border-0">Nama Produk</th>
                        <th class="border-0">Harga</th>
                        <th class="border-0">Deskripsi Singkat</th>
                        <th class="border-0 rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ingin menghapus data ini?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data Produk belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginasi -->
        <div class="mt-3">
            {!! $products->links() !!}
        </div>

    </div>
</div>
@endsection
