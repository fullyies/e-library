@extends('layout.app')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-edit"></i>
            Edit Data Buku
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

        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Form Edit Buku</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('buku.update', $buku->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode Buku</label>
                    <input type="text"
                           class="form-control"
                           name="kode_buku"
                           value="{{ $buku->kode_buku }}"
                           readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text"
                           class="form-control"
                           name="judul"
                           value="{{ $buku->judul }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>

                    <select name="kategori_id" class="form-select">

                        @foreach($kategoris as $kategori)

                        <option value="{{ $kategori->id }}"
                            {{ $kategori->id == $buku->kategori_id ? 'selected' : '' }}>

                            {{ $kategori->nama_kategori }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">
                    <label class="form-label">Penulis</label>

                    <input type="text"
                           class="form-control"
                           name="penulis"
                           value="{{ $buku->penulis }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Penerbit</label>

                    <input type="text"
                           class="form-control"
                           name="penerbit"
                           value="{{ $buku->penerbit }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>

                    <input type="number"
                           class="form-control"
                           name="tahun_terbit"
                           value="{{ $buku->tahun_terbit }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>

                    <input type="number"
                           class="form-control"
                           name="stok"
                           value="{{ $buku->stok }}">
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i>
                    Update
                </button>

                <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection