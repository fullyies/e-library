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
<<<<<<< HEAD
                    <input type="text" name="kode_pinjam" class="form-control"
                           value="{{ $kode_pinjam }}" readonly>
=======
                    <input type="text"
                           name="kode_pinjam"
                           class="form-control"
                           value="{{ $kode_pinjam }}"
                           readonly>
>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
                </div>

                <div class="mb-3">
                    <label class="form-label">Anggota</label>
<<<<<<< HEAD
                    <select name="user_id" class="form-select">
                        <option value="">-- Pilih Anggota --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
=======

                    <select name="user_id" class="form-select">
                        <option value="">-- Pilih Anggota --</option>

                        @foreach($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control">
                </div>

                <hr>

                <h5>Daftar Buku</h5>

                <table class="table table-bordered">

                    <thead class="table-light">
                        <tr>
                            <th>Buku</th>
                            <th width="150">Jumlah</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <select name="buku_id[]" class="form-select">
                                    @foreach($bukus as $buku)
                                        <option value="{{ $buku->id }}">
                                            {{ $buku->judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number"
                                       name="jumlah[]"
                                       class="form-control"
                                       value="1"
                                       min="1">
                            </td>
                        </tr>
                    </tbody>

                </table>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
<<<<<<< HEAD
</div>

@endsection
=======

</div>

@endsection
>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
