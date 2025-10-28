@extends('layouts.admin.app')
@section('content')
<div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pelanggan</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Tambah Pelanggan</h1>
                    <p class="mb-0">Form untuk menambahkan data pelanggan baru.</p>
                </div>
                <div>
                    <a href="{{route('user.index')}}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-lg-4 col-sm-6">
                                    <!-- name -->
                                    <div class="mb-3">
                                        <label for="NamaLengkap" class="form-label">NamaLengkap</label>
                                        <!-- Ubah name="NamaLengkap" menjadi name="name" -->
                                        <input name="name" type="text" id="NamaLengkap" class="form-control" required>
                                    </div>
                                    <!-- password -->
                                    <div class="mb-3">
                                        <label for="Password" class="form-label">Password</label>
                                        <!-- Ubah name="Password" menjadi name="password" -->
                                        <input name="password" type="password" id="Password" class="form-control" required> 
                                        <!-- Saya juga mengubah type="text" menjadi type="password" agar disembunyikan -->
                                    </div>

                                <div class="col-lg-4 col-sm-6">

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input name="email"type="text" id="email" class="form-control" required>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

@endsection
