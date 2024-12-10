<header>
    <div class="container header-container">
        <!-- Make the header clickable to redirect to articles.index -->
        <h1><a href="{{ route('articles.index') }}" class="article-title">ArticleCraft</a></h1>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <style>
            /* Gaya untuk teks ArticleCraft */
            .article-title {
                font-size: 36px; /* Ukuran font yang lebih besar */
                font-family: 'Montserrat', sans-serif; /* Ganti dengan font yang diinginkan */
                font-weight: 700; /* Jika ingin teks lebih tebal */
                text-decoration: none; /* Pastikan teks tidak ada garis bawah */
                color: inherit; /* Mempertahankan warna teks dari link */
            }

            /* Gaya untuk tombol logout modern */
.logout-button {
    background: #5a8eeb; /* Gradasi warna merah */
    color: white; /* Warna teks putih */
    border: none;
    padding: 12px 24px; /* Ukuran padding lebih besar untuk tombol lebih besar */
    border-radius: 10px; /* Sudut membulat */
    cursor: pointer;
    text-align: center;
    display: block;
    width: 100%;
    font-weight: bold; /* Teks lebih tebal */
    font-size: 16px; /* Ukuran font yang lebih besar */
    transition: all 0.3s ease; /* Transisi halus untuk perubahan */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan halus */
}

.logout-button:hover {
    background: linear-gradient(145deg, #e60000, #ff0000); /* Gradasi lebih gelap saat hover */
    transform: translateY(-3px); /* Efek angkat saat hover */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); /* Bayangan lebih tajam saat hover */
}

.logout-button:focus {
    outline: none; /* Menghilangkan outline saat fokus */
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.5); /* Highlight fokus */
}

        </style>

        <div class="search-container">
            <input id="search-input" type="text" placeholder="Cari artikel yang menarik dan informatif di sini..." aria-label="Search Articles">
            <button>
                <i class="fas fa-search"></i>
            </button>
        </div>

        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('about') }}"><b>ABOUT US</b></a></li>

                <!-- Dropdown Menu -->
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="userDropdown" onclick="toggleDropdown(event)">
                            {{ Auth::user()->name }} 
                        </a>
                        <ul class="dropdown-menu" id="dropdownMenu">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li> <!-- Change this to dashboard route -->
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <button class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </button>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="admin-link"><b>MANAGE</b></a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
