<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="/">Home</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="/belajar">Belajar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('films.index') }}">Film</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Blue background with white text -->

    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>
