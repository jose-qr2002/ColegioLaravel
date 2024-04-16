<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css" integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <style>
          body {
            min-height: 100vh;
            background: linear-gradient(to bottom, #f7f5f5f1, #ebe8e8);
          }

          .error {
            background-color: rgb(241, 159, 159);
            color: #ec0e0e;
            font-weight: 700;
            border-inline: 3px solid #f80000;
            padding: 5px;
            font-size: 13px;
            margin-top: 10px;
          }
        </style>
        @yield('estilos')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Edut<span class="fw-bold">TK</span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link {{ $link == 'alumnos' ? 'active' : '' }}" href="{{ route('alumnos.index') }}">Alumnos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ $link == 'instructores' ? 'active' : '' }}" href="{{ route('instructores.index') }}">Instructores</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ $link == 'cursos' ? 'active' : '' }}" href="{{ route('cursos.index') }}">Cursos</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        @yield('contenido')
    </body>
</html>
