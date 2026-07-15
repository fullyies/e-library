<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Library</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS Sendiri -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

    <!-- Navbar -->
    @include('partials.navbar')

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2 p-0">
                @include('partials.sidebar')
            </div>

            <!-- Content -->
            <div class="col-md-10 p-4">
                @yield('content')
            </div>

        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>