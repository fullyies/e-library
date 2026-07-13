<!DOCTYPE html>
<html>

<head>

    <title>Login E-Library</title>

</head>

<body>

<h2>Login E-Library</h2>

@if(session('error'))

<p style="color:red">

    {{ session('error') }}

</p>

@endif

<form action="{{ url('/login') }}" method="POST">

    @csrf

    <table>

        <tr>

            <td>Username</td>

            <td>

                <input type="text" name="username">

            </td>

        </tr>

        <tr>

            <td>Password</td>

            <td>

                <input type="password" name="password">

            </td>

        </tr>

        <tr>

            <td></td>

            <td>

                <button type="submit">

                    Login

                </button>

            </td>

        </tr>

    </table>

</form>

</body>

</html>