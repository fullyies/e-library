@extends('layout.main')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Data Peminjaman</h3>

        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
            Tambah Peminjaman
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>No</th>
                <th>Kode Pinjam</th>
                <th>Anggota</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th width="120">Aksi</th>
            </tr>

        </thead>

        <tbody>

        @forelse($peminjamans as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->kode_pinjam }}</td>

                <td>{{ $item->user->name }}</td>

                <td>{{ $item->tanggal_pinjam }}</td>

                <td>{{ $item->tanggal_kembali }}</td>

                <td>{{ $item->status }}</td>

                <td>

                    <a href="{{ route('peminjaman.edit',$item->id) }}"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7" class="text-center">

                    Belum ada data peminjaman.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection