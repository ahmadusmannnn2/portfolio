<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" contents="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Portfolio UI/UX Design | Ahmad Usman')</title>

    <link rel="shortcut icon" href="{{ asset('favicon2.ico') }}" type="image/x-icon" />

    <!-- Box Icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @stack('styles')
  </head>

  <body>
    <!-- Header -->
    <header class="header">
      <a href="{{ url('/') }}" class="logo">Portfolio</a>
      <i class="bx bx-menu" id="menu-icon"></i>
      <nav class="navbar">
        <a href="#home" class="active">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#portfolio">Portfolio</a>
        <a href="#contact">Contact</a>
      </nav>
    </header>

    <!-- Konten Utama -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-text">
        <p>&copy; {{ date('Y') }} by Ahmad Usman | All Rights Reserved.</p>
      </div>
      <div class="footer-iconTop">
        <a href="#home"><i class="bx bx-up-arrow-alt"></i></a>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
  </body>
</html>
