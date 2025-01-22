<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
              <img src="/img/alien-svgrepo-com.svg" alt="HDC Events">
            </a>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="/" class="nav-link">Itens</a>
              </li>
              <li class="nav-item">
                <a href="/items/create" class="nav-link">Entrada</a>
              </li>
              <li class="nav-item">
                <a href="/" class="nav-link">Saida</a>
              </li>
              <li class="nav-item">
                <a href="/" class="nav-link">Usuarios</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      @yield('content')
      <footer>
        <p>Detin &copy; 2025</p>
      </footer>
    </body>
</html>