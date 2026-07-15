@extends('layout.app')

@section('content')

<h2>Edit User</h2>

<hr>

@if($errors->any())

<div>

    <ul>

        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ route('user.update',$user->id) }}" method="POST">

    @csrf
    @method('PUT')

    <table>

        <tr>

            <td>Nama</td>

            <td>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name',$user->name) }}">

            </td>

        </tr>

        <tr>

            <td>Username</td>

            <td>

                <input
                    type="text"
                    name="username"
                    value="{{ old('username',$user->username) }}">

            </td>

        </tr>

        <tr>

            <td>Email</td>

            <td>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email',$user->email) }}">

            </td>

        </tr>

        <tr>

            <td>Password Baru</td>

            <td>

                <input
                    type="password"
                    name="password">

                <br>

                <small>Kosongkan jika tidak ingin mengubah password.</small>

            </td>

        </tr>

        <tr>

            <td>Role</td>

            <td>

                <select name="role">

                    <option value="admin"
                        {{ $user->role=='admin' ? 'selected' : '' }}>

                        Admin

                    </option>

                    <option value="anggota"
                        {{ $user->role=='anggota' ? 'selected' : '' }}>

                        Anggota

                    </option>

                </select>

            </td>

        </tr>

    </table>

    <br>

    <button type="submit">

        Update

    </button>

    <a href="{{ route('user.index') }}">

        Kembali

    </a>

</form>

@endsection