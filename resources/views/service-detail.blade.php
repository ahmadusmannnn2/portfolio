@extends('layouts.frontend')

@section('title', $service->title . ' | Ahmad Usman')

@section('content')
{{-- Bagian Deskripsi Layanan --}}
<section class="about" id="about" style="padding-bottom: 5rem; min-height: auto;">
    <div class="about-content" style="text-align: center;">
        <h2 class="heading" style="text-align: center;">{!! $service->title !!}</h2>
        <i class="{{ $service->icon_class }}" style="font-size: 8rem; color: var(--main-color); margin-bottom: 2rem;"></i>
        <div style="max-width: 800px; margin: 0 auto;">
            <p style="font-size: 1.8rem; line-height: 1.6;">
                {!! nl2br(e($service->long_description)) !!}
            </p>
        </div>
        <a href="{{ route('home') }}#services" class="btn" style="margin-top: 4rem;">Kembali ke Semua Layanan</a>
    </div>
</section>

{{-- Bagian Portofolio Terkait (BARU) --}}
@if($relatedPortfolios->isNotEmpty())
<section class="portfolio" id="portfolio" style="padding-top: 5rem; background: var(--bg-color);">
    <h2 class="heading">Related <span>Projects</span></h2>

    <div class="portfolio-container">
        @foreach($relatedPortfolios as $p)
            <div class="portfolio-box">
                <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->title }}" />
                <div class="portfolio-layer">
                    <h4>{{ $p->title }}</h4>
                    <p>{{ $p->category->name }}</p>
                    @if($p->project_link)
                        <a href="{{ $p->project_link }}" target="_blank"><i class='bx bx-link-external'></i></a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif
@endsection