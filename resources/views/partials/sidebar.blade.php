<div class="bg-dark text-white vh-100">

    <div class="p-3">

        <h4 class="text-center mb-4">
            <i class="fas fa-book-reader"></i>
            E-Library
        </h4>

        <ul class="nav flex-column">

            <!-- Dashboard -->
            <li class="nav-item mb-2">
                <a href="{{ url('/') }}"
                    class="nav-link {{ request()->is('/') ? 'bg-primary rounded text-white' : 'text-white' }}">
                    <i class="fas fa-home me-2"></i>
                    Dashboard
                </a>
            </li>

            <!-- Buku -->
            <li class="nav-item mb-2">
                <a href="{{ route('buku.index') }}"
                    class="nav-link {{ request()->is('buku*') ? 'bg-primary rounded text-white' : 'text-white' }}">
                    <i class="fas fa-book me-2"></i>
                    Data Buku
                </a>
            </li>

            <!-- Kategori -->
            <li class="nav-item mb-2">
                <a href="{{ route('kategori.index') }}"
                    class="nav-link {{ request()->is('kategori*') ? 'bg-primary rounded text-white' : 'text-white' }}">
                    <i class="fas fa-folder me-2"></i>
                    Kategori
                </a>
            </li>

            <!-- Peminjaman -->
            <li class="nav-item mb-2">
                <a href="{{ route('peminjaman.index') }}"
                    class="nav-link {{ request()->is('peminjaman*') ? 'bg-primary rounded text-white' : 'text-white' }}">
                    <i class="fas fa-exchange-alt me-2"></i>
                    Peminjaman
                </a>
            </li>

        </ul>

    </div>

</div>