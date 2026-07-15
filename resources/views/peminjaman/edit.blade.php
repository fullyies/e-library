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

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Form Edit Peminjaman</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" class="form-control"
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
                    <input type="date" name="tanggal_pinjam" class="form-control"
                           value="{{ $peminjaman->tanggal_pinjam }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control"
                           value="{{ $peminjaman->tanggal_kembali }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="Dipinjam" {{ $peminjaman->status=='Dipinjam'?'selected':'' }}>Dipinjam</option>
                        <option value="Dikembalikan" {{ $peminjaman->status=='Dikembalikan'?'selected':'' }}>Dikembalikan</option>
                        <option value="Terlambat" {{ $peminjaman->status=='Terlambat'?'selected':'' }}>Terlambat</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-danger">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">Zona Berbahaya</h5>
        </div>
        <div class="card-body">
            <p class="text-muted mb-3">
                Menghapus data peminjaman ini bersifat permanen dan tidak bisa dibatalkan.
            </p>
            <form action="{{ route('peminjaman.destroy',$peminjaman->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </form>
        </div>
    </div>

</div>

@endsection
