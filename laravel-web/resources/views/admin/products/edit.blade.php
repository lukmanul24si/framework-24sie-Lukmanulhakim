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
<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
</ol>
</nav>
<div class="d-flex justify-content-between w-100 flex-wrap">
<div class="mb-3 mb-lg-0">
<h1 class="h4">Edit Produk</h1>
<p class="mb-0">Form untuk mengubah data produk.</p>
</div>
<div>
<a href="{{ route('products.index') }}" class="btn btn-primary"><i class="far fa-arrow-alt-circle-left me-1"></i> Kembali</a>
</div>
</div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Wajib untuk update -->

                    <div class="row mb-4">
                        <!-- Kolom Kiri -->
                        <div class="col-lg-6 col-sm-12">
                            <!-- Nama Produk -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk</label>
                                <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Harga -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input name="price" type="number" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-lg-6 col-sm-12">
                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $product->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
