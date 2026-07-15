@extends('layout.app')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-plus-circle"></i>
            Tambah Peminjaman
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
            <h5 class="mb-0">Form Tambah Peminjaman</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('peminjaman.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Pinjam</label>
                    <input
                        type="text"
                        name="kode_pinjam"
                        class="form-control"
                        value="{{ $kode_pinjam }}"
                        readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Anggota</label>
                    <select name="user_id" class="form-select">
                        <option value="">-- Pilih Anggota --</option>

                        @foreach($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input
                        type="date"
                        name="tanggal_pinjam"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali</label>
                    <input
                        type="date"
                        name="tanggal_kembali"
                        class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan
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