<header>
    <div class="container header-container">
        <!-- Header clickable -->
        <h1><a href="{{ route('articles.index') }}" style="text-decoration: none; color: inherit;">article.zulvika</a></h1>

        <div class="search-container">
            <input id="search-input" type="text" placeholder="Cari artikel yang menarik dan informatif di sini..." aria-label="Search Articles">
            <button id="search-button" type="button">🔍 Cari</button>
        </div>

        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('about') }}">Informasi Umum</a></li>
                
                <!-- Dropdown Menu -->
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="userDropdown">
                        {{ Auth::user()->name }} ▼
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.kategori') }}">Mengelola Kategori</a></li>
                        <li><a href="{{ route('admin.tag') }}">Mengelola Tag</a></li>
                        <li><a href="{{ route('admin.artikel') }}">Mengelola Artikel</a></li>
                        <li><a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else
                <li><a href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
