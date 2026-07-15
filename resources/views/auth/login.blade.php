<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login E-Library</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            min-height: 100vh;
        }

        .login-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }

        .login-card .card-header {
            border: none;
            padding: 2rem 1.5rem 1.5rem;
        }

        .login-card .card-header i {
            font-size: 2rem;
            margin-bottom: 0.25rem;
            display: block;
        }

        .login-card .card-body {
            padding: 2rem 1.75rem;
        }

        .input-group-text {
            background-color: #f8f9fc;
            border-right: none;
        }

        .form-control {
            border-left: none;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .input-group:focus-within .input-group-text {
            border-color: #86b7fe;
        }

        .input-group:focus-within .form-control {
            border-color: #86b7fe;
        }

        .btn-primary {
            padding: 0.6rem;
            font-weight: 500;
        }

        #togglePassword {
            cursor: pointer;
            background-color: #f8f9fc;
            border-left: none;
        }
    </style>

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5 col-lg-4">

            <div class="card login-card shadow">

                <div class="card-header bg-primary text-white text-center">

                    <i class="fas fa-book-reader"></i>

                    <h4 class="mb-0 fw-bold">E-Library</h4>
                    <small class="opacity-75">Silakan masuk untuk melanjutkan</small>

                </div>

                <div class="card-body">

                    @if(session('error'))
                        <div class="alert alert-danger py-2">
                            <i class="fas fa-circle-exclamation me-1"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input
                                    type="text"
                                    name="username"
                                    value="{{ old('username') }}"
                                    class="form-control"
                                    placeholder="Masukkan username"
                                    autofocus
                                    required>
                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required>
                                <span class="input-group-text" id="togglePassword">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </span>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-sign-in-alt"></i>
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>

</body>

</html>