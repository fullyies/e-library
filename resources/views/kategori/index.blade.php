@extends('layout.app')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-circle-check me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold mb-0">
            <i class="fas fa-folder"></i>
            Data Kategori
        </h2>

        <a href="{{ route('kategori.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Kategori
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Kategori</h5>
            <span class="badge bg-light text-primary">
                {{ $kategoris->count() }} kategori
            </span>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th width="80">No</th>
                            <th>Nama Kategori</th>
                            <th width="180">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($kategoris as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->nama_kategori }}</td>

                            <td>

                                <a href="{{ route('kategori.edit',$item->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>
                                    Edit

                                </a>

                                <form action="{{ route('kategori.destroy',$item->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus kategori {{ $item->nama_kategori }}?')"
                                        class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                <i class="fas fa-folder-open fa-2x mb-2 d-block"></i>
                                Belum ada kategori, yuk tambah yang pertama
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection