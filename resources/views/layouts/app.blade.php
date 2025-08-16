<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Absensi')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Absensi</a>
    <div>
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('employees.index') }}">Karyawan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('departements.index') }}">Departemen</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('attendances.index') }}">Absensi</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('attendances.history') }}">Riwayat Absensi</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="container py-4">
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Terjadi kesalahan:</strong>
      <ul class="mb-0">
        @foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach
      </ul>
    </div>
  @endif

  @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
