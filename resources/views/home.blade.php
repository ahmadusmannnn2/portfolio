@extends('layouts.frontend')

{{-- Judul halaman sekarang dinamis, diambil dari database --}}
@section('title', 'Home | ' . ($contents['home_name']->value ?? 'Ahmad Usman'))

@section('content')
  <section class="home" id="home">
    <div class="home-content">
      {{-- Menggunakan data dari database --}}
      <h3>{{ $contents['home_greeting']->value ?? "Hello, It's Me" }}</h3>
      <h1>{{ $contents['home_name']->value ?? 'Ahmad Usman' }}</h1>
      {{-- Teks berkedip akan diisi oleh JavaScript, tapi datanya dari sini --}}
      <h3>And I'm a <span class="multiple-text" data-roles="{{ $contents['home_roles']->value ?? 'UI/UX Designer' }}"></span></h3>
      <p>
        {{ $contents['home_paragraph']->value ?? 'I am passionate about creating user-centered digital experiences...' }}
      </p>
      
      <div class="social-media">
        {{-- Link media sosial masih statis seperti sebelumnya --}}
        <a href="https://wa.me/6283816925369" target="_blank"><i class="bx bxl-whatsapp"></i></a>
        <a href="https://instagram.com/tentang.desain?igshid=MzRlODBiNWFlZA==" target="_blank"><i class="bx bxl-instagram-alt"></i></a>
        <a href="https://dribbble.com/ahmdusman" target="_blank"><i class="bx bxl-dribbble"></i></a>
        <a href="https://id.linkedin.com/in/ahmad-usman-292188275" target="_blank"><i class="bx bxl-linkedin"></i></a>
      </div>
      
      {{-- Link CV sekarang dinamis --}}
      <a href="{{ asset('storage/' . ($contents['home_cv']->value ?? '')) }}" target="_blank" class="btn">Download CV</a>
    </div>
    <div class="home-img">
      {{-- Gambar home sekarang dinamis --}}
      <img src="{{ asset('storage/' . ($contents['home_image']->value ?? '')) }}" alt="Foto Home" />
    </div>
  </section>

  <section class="about" id="about">
    <div class="about-img">
      {{-- Gambar about sekarang dinamis --}}
      <img src="{{ asset('storage/' . ($contents['about_image']->value ?? '')) }}" alt="about-photo" />
    </div>
    <div class="about-content">
      {{-- Judul dan sub-judul dinamis --}}
      <h2 class="heading">{!! $contents['about_heading']->value ?? 'About <span>Me</span>' !!}</h2>
      <h3>{{ $contents['about_subheading']->value ?? 'UX Designer' }}</h3>
      <p>
        {{ $contents['about_paragraph']->value ?? 'I am a professional in the field of UX Designer...' }}
      </p>
      {{-- Link sertifikat sekarang dinamis --}}
      <a href="{{ asset('storage/' . ($contents['about_certificate']->value ?? '')) }}" target="_blank" class="btn">Download Certificate</a>
    </div>
  </section>

  <section class="services" id="services">
    <h2 class="heading">Our <span>Services</span></h2>
    <div class="services-container">
      <div class="services-box">
        <i class="bx bx-code-alt"></i>
        <h3>UI/UX Design</h3>
        <p>
          Ease every step of the user with our innovative UI & UX design.
          Welcome an unforgettable online experience!
        </p>
        <a href="#portfolio" class="btn">Read More</a>
      </div>
      <div class="services-box">
        <i class="bx bxs-paint"></i>
        <h3>Graphic Designer</h3>
        <p>
          I can serve: Promotion, Digital Graphics, Editorial, Packaging,
          Typography, Illustration, Motion Graphics.
        </p>
        <a href="#portfolio" class="btn">Read More</a>
      </div>
      <div class="services-box">
        <i class="bx bx-bar-chart-alt"></i>
        <h3>Frontend Developer</h3>
        <p>
          Optimize your website's user experience with our frontend developer
          expertise. Bring your designs to life!
        </p>
        <a href="#portfolio" class="btn">Read More</a>
      </div>
    </div>
  </section>

  <section class="portfolio" id="portfolio">
    <h2 class="heading">Latest <span>Project</span></h2>

    <div class="portfolio-filter">
        <button class="btn active" data-filter="*">All</button>
        @foreach ($categories as $category)
            <button class="btn" data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
        @endforeach
    </div>

    <div class="portfolio-container">
      @forelse($portfolios as $p)
        <div class="portfolio-box {{ $p->category->slug }}">
          <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->title }}" />
          <div class="portfolio-layer">
            <h4>{{ $p->title }}</h4>
            <p>{{ $p->category->name }}</p>
            @if($p->project_link)
              <a href="{{ $p->project_link }}" target="_blank"><i class='bx bx-link-external'></i></a>
            @endif
          </div>
        </div>
      @empty
        <p class="text-center" style="grid-column: 1 / -1;">Belum ada project.</p>
      @endforelse
    </div>
  </section>

  <section class="contact" id="contact">
    <h2 class="heading">Contact <span>Me!</span></h2>
    <form action="https://formspree.io/f/xqkrzvgg" method="post">
      <div class="input-box">
        <input type="text" placeholder="Full Name" name="name" id="name" />
        <input type="email" placeholder="Email Address" name="email" id="email" />
      </div>
      <textarea name="message" id="message" cols="30" rows="10" placeholder="message"></textarea>
      <input type="submit" value="Send Message" class="btn" />
    </form>
  </section>
@endsection