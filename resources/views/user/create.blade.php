@extends('layout.app')

@section('content')

<h2>Tambah User</h2>

<hr>

<form action="{{ route('user.store') }}" method="POST">

    @csrf

@if($errors->any())

<div>

    <ul>

        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

    <table>

        <tr>

            <td>Nama</td>

            <td>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}">

            </td>

        </tr>

        <tr>

            <td>Username</td>

            <td>

                <input
                    type="text"
                    name="username"
                    value="{{ old('username') }}">

            </td>

        </tr>

        <tr>

            <td>Email</td>

            <td>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}">

            </td>

        </tr>

        <tr>

            <td>Password</td>

            <td>

                <input
                    type="password"
                    name="password">

            </td>

        </tr>

        <tr>

            <td>Role</td>

            <td>

                <select name="role">

                    <option value="admin">

                        Admin

                    </option>

                    <option value="anggota">

                        Anggota

                    </option>

                </select>

            </td>

        </tr>

    </table>

    <br>

    <button>

        Simpan

    </button>

    <a href="{{ route('user.index') }}">

        Kembali

    </a>

</form>

@endsection