@extends('layout.app')

@section('content')

<h2>Data User</h2>

<a href="{{ route('user.create') }}">
    Tambah User
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>

    @foreach($users as $user)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $user->name }}</td>

        <td>{{ $user->username }}</td>

        <td>{{ $user->email }}</td>

        <td>{{ ucfirst($user->role) }}</td>

        <td>

            <a href="{{ route('user.edit',$user->id) }}">
                Edit
            </a>

            |

            <form action="{{ route('user.destroy',$user->id) }}"
                method="POST"
                style="display:inline">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    onclick="return confirm('Yakin ingin menghapus user ini?')">

                    Hapus

                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>
<a href="{{ route('dashboard') }}" class="btn btn-secondary">
    Kembali
</a>
@endsection