@extends('layout.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            <i class="fas fa-exchange-alt"></i>
            Data Peminjaman
        </h2>

        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Peminjaman
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Peminjaman</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>Kode Pinjam</th>
                            <th>Anggota</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th width="220">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($peminjaman as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_pinjam }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali }}</td>

                            <td>
                                @if($item->status == 'Dipinjam')
                                    <span class="badge bg-warning">
                                        {{ $item->status }}
                                    </span>
                                @elseif($item->status == 'Dikembalikan')
                                    <span class="badge bg-success">
                                        {{ $item->status }}
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        {{ $item->status }}
                                    </span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('peminjaman.show',$item->id) }}"
                                   class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('peminjaman.edit',$item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                @if($item->status == 'Dipinjam')
                                    <form action="{{ route('peminjaman.kembali',$item->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        <button
                                            type="submit"
                                            class="btn btn-success btn-sm"
                                            onclick="return confirm('Yakin buku dikembalikan?')">

                                            Kembalikan

                                        </button>

                                    </form>
                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada data peminjaman.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>

</div>

@endsection