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
    
    {{-- HAPUS SCRIPT ISOTOPE DAN GANTI DENGAN INI --}}
    <script>
        // Ambil semua tombol filter dan semua kotak portofolio
        const filterButtons = document.querySelectorAll('.portfolio-filter .btn');
        const portfolioItems = document.querySelectorAll('.portfolio-container .portfolio-box');

        // Tambahkan event listener untuk setiap tombol
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Hapus kelas 'active' dari semua tombol
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Tambahkan kelas 'active' ke tombol yang baru saja diklik
                button.classList.add('active');

                // Dapatkan nilai filter dari atribut data-filter
                const filterValue = button.getAttribute('data-filter');

                // Loop melalui setiap item portofolio
                portfolioItems.forEach(item => {
                    // Jika filter adalah 'semua' (*), atau jika item memiliki kelas filter yang sesuai
                    if (filterValue === '*' || item.classList.contains(filterValue.substring(1))) {
                        item.classList.remove('hide'); // Tampilkan item
                    } else {
                        item.classList.add('hide'); // Sembunyikan item
                    }
                });
            });
        });
    </script>
    
    @stack('scripts')
  </body>
</html>