@extends('layout.app')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-edit"></i>
            Edit Peminjaman
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
            <h5 class="mb-0">Form Edit Peminjaman</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Peminjam</label>

                    <input type="text"
                           name="nama_peminjam"
                           class="form-control"
                           value="{{ $peminjaman->nama_peminjam }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Buku</label>

                    <select name="buku_id" class="form-select">

                        @foreach($bukus as $buku)

                            <option value="{{ $buku->id }}"
                                {{ $buku->id == $peminjaman->buku_id ? 'selected' : '' }}>

                                {{ $buku->judul }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pinjam</label>

                    <input type="date"
                           name="tanggal_pinjam"
                           class="form-control"
                           value="{{ $peminjaman->tanggal_pinjam }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali</label>

                    <input type="date"
                           name="tanggal_kembali"
                           class="form-control"
                           value="{{ $peminjaman->tanggal_kembali }}">
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i>
                    Update
                </button>

                <a href="{{ route('peminjaman.index') }}"
                   class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection