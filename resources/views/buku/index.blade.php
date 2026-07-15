@extends('layout.app')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-book"></i>
            Data Buku
        </h2>

        @if(Auth::user()->role == 'admin')
            <a href="{{ route('buku.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Buku
            </a>
        @endif
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Buku</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            @if(Auth::user()->role == 'admin')
                                <th width="180">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bukus as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_buku }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->tahun_terbit }}</td>
                            <td>
                                <span class="badge bg-success">{{ $item->stok }}</span>
                            </td>
                            @if(Auth::user()->role == 'admin')
                            <td>
                                <a href="{{ route('buku.edit',$item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('buku.destroy',$item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus buku ini?')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
