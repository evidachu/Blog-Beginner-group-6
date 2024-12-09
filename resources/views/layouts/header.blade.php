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

</style>


        <div class="search-container">
            <input id="search-input" type="text" placeholder="Cari artikel yang menarik dan informatif di sini..." aria-label="Search Articles">
            <button>
        <i class="fas fa-search"></i>
    </button>
        </div>

        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('about') }}">About Us</a></li>

<!-- Dropdown Menu -->
@auth
<li class="dropdown">
    <a href="#" class="dropdown-toggle" id="userDropdown" onclick="toggleDropdown(event)">
        {{ Auth::user()->name }} 
    </a>
    <ul class="dropdown-menu" id="dropdownMenu">
        <li><a href="{{ route('admin.kategori') }}">Mengelola Kategori</a></li>
        <li><a href="{{ route('admin.tag') }}">Mengelola Tag</a></li>
        <li><a href="{{ route('admin.artikel') }}">Mengelola Artikel</a></li>
        <li>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
@else
<li><a href="{{ route('login') }}" class="admin-link">Manage</a></li>
@endauth
            </ul>
        </nav>
    </div>
</header>


