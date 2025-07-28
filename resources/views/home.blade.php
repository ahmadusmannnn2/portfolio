@extends('layouts.frontend')

@section('title', 'Home | Ahmad Usman')

@section('content')
  <!-- home section -->
  <section class="home" id="home">
    <div class="home-content">
      <h3>Hello, It's Me</h3>
      <h1>Ahmad Usman</h1>
      <h3>And I'm a <span class="multiple-text"></span></h3>
      <p>
        I am passionate about creating user-centered digital experiences that
        are not only visually appealing but also highly functional. My
        portfolio showcases a selection of my best work, highlighting my
        skills in user interface (UI) and user experience (UX) design.
      </p>
      <div class="social-media">
        <a href="https://wa.me/6283816925369" target="_blank"><i class="bx bxl-whatsapp"></i></a>
        <a href="https://instagram.com/tentang.desain?igshid=MzRlODBiNWFlZA==" target="_blank"><i class="bx bxl-instagram-alt"></i></a>
        <a href="https://dribbble.com/ahmdusman" target="_blank"><i class="bx bxl-dribbble"></i></a>
        <a href="https://id.linkedin.com/in/ahmad-usman-292188275" target="_blank"><i class="bx bxl-linkedin"></i></a>
      </div>
      <a href="{{ asset('file/resume.pdf') }}" target="_blank" class="btn">Download CV</a>
    </div>
    <div class="home-img">
      <img src="{{ asset('images/home.png') }}" alt="foto about" />
    </div>
  </section>

  <!-- about section -->
  <section class="about" id="about">
    <div class="about-img">
      <img src="{{ asset('images/about.png') }}" alt="about-photo" />
    </div>
    <div class="about-content">
      <h2 class="heading">About <span>Me</span></h2>
      <h3>UX Designer</h3>
      <p>
        I am a professional in the field of UX Designer, with 2 year of
        experience. My education includes an Associate Degree in Computer
        Science, which gave me a strong foundation in Information Management.
        Outside of work, I have an interest in music and art.
      </p>
      <a href="{{ asset('file/sertifikat.pdf') }}" target="_blank" class="btn">Download Certificate</a>
    </div>
  </section>

  <!-- services section -->
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

  <!-- portfolio section -->
  <section class="portfolio" id="portfolio">
    <h2 class="heading">Latest <span>Project</span></h2>

    {{-- Filter Kategori --}}
    <div class="portfolio-filter">
        <button class="btn active" data-filter="*">All</button>
        @foreach ($categories as $category)
            <button class="btn" data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
        @endforeach
    </div>

    <div class="portfolio-container">
      @forelse($portfolios as $p)
        {{-- Tambahkan class slug dari kategori untuk filtering --}}
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

  <!-- contact section -->
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
