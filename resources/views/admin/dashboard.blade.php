<!DOCTYPE html>
<html>
<head>
    <title>Dasbor Admin</title>
</head>
<body>
    <h1>Selamat Datang di Dasbor Admin</h1>
    <nav>
        <ul>
            <li><a href="{{ route('admin.kategori') }}">Mengelola Kategori</a></li>
            <li><a href="{{ route('admin.tag') }}">Mengelola Tag</a></li>
            <li><a href="{{ route('admin.artikel') }}">Mengelola Artikel</a></li>
        </ul>
    </nav>
</body>
</html>
