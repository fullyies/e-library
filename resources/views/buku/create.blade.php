@extends('layout.app')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-plus-circle"></i>
            Tambah Data Buku
        </h2>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Tambah Buku</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('buku.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Buku</label>
                    <input type="text"
                        class="form-control"
                        name="kode_buku"
                        value="{{ $kode_buku }}"
                        readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text"
                        class="form-control"
                        name="judul">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>

                    <select name="kategori_id" class="form-select">

                        @foreach($kategoris as $kategori)

                            <option value="{{ $kategori->id }}">
                                {{ $kategori->nama_kategori }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">
                    <label class="form-label">Penulis</label>

                    <input type="text"
                        class="form-control"
                        name="penulis">
                </div>

                <div class="mb-3">
                    <label class="form-label">Penerbit</label>

                    <input type="text"
                        class="form-control"
                        name="penerbit">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>

                    <input type="number"
                        class="form-control"
                        name="tahun_terbit">
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>

                    <input type="number"
                        class="form-control"
                        name="stok">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

                <a href="{{ route('buku.index') }}"
                    class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection