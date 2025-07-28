<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Portfolio UI/UX Design | Ahmad Usman')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @stack('styles')
  </head>

  <body>
    <header class="header">
      <a href="{{ route('home') }}" class="logo">Portfolio</a>
      <i class="bx bx-menu" id="menu-icon"></i>
      
      {{-- ===== PERUBAHAN DI SINI ===== --}}
      <nav class="navbar">
        <a href="{{ route('home') }}#home" class="active">Home</a>
        <a href="{{ route('home') }}#about">About</a>
        <a href="{{ route('home') }}#services">Services</a>
        <a href="{{ route('home') }}#portfolio">Portfolio</a>
        <a href="{{ route('home') }}#contact">Contact</a>
      </nav>
      {{-- ============================== --}}
    </header>

    @yield('content')

    <footer class="footer">
      <div class="footer-text">
        <p>&copy; {{ date('Y') }} by Ahmad Usman | All Rights Reserved.</p>
      </div>
      <div class="footer-iconTop">
        <a href="#home"><i class="bx bx-up-arrow-alt"></i></a>
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    
    {{-- Script untuk filter sederhana --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.portfolio-filter .btn');
            const portfolioItems = document.querySelectorAll('.portfolio-container .portfolio-box');

            if (filterButtons.length > 0) {
                filterButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        filterButtons.forEach(btn => btn.classList.remove('active'));
                        button.classList.add('active');
                        const filterValue = button.getAttribute('data-filter');
                        portfolioItems.forEach(item => {
                            if (filterValue === '*' || item.classList.contains(filterValue.substring(1))) {
                                item.classList.remove('hide');
                            } else {
                                item.classList.add('hide');
                            }
                        });
                    });
                });
            }
        });
    </script>
    
    @stack('scripts')
  </body>
</html>