<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <i class="fas fa-book-open"></i> E-Library
        </a>

        <!-- Tombol Responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item me-3">
                    <span class="text-white">
                        <i class="fas fa-user-circle"></i>
                        Admin
                    </span>
                </li>

                <li class="nav-item">
                    <a href="#" class="btn btn-light btn-sm">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>