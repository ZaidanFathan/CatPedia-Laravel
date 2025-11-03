<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - CatPedia Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/styles_admin.css") }}">
</head>
<body class="bg-light">

    {{-- Navbar --}}
    @include('admin.components.navbar')
 

    {{-- Konten Utama --}}
    <div class="container py-4">
        <h2 class="mb-4">@yield('page_title')</h2>
        @yield('content')
    </div>

    {{-- Footer --}}
  <footer class="text-center py-3 bg-dark text-white fixed-bottom">
    <small>© 2025 CatPedia Admin Panel</small>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
