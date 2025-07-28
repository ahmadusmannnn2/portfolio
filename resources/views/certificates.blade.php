@extends('layouts.frontend')

@section('title', 'Certificates | Ahmad Usman')

@section('content')
<section class="portfolio" id="portfolio" style="padding-bottom: 8rem;">
    <h2 class="heading">My <span>Certificates</span></h2>

    <div class="portfolio-container">
        @forelse($certificates as $certificate)
            <div class="portfolio-box">
                <img src="{{ asset('storage/' . $certificate->thumbnail_image) }}" alt="{{ $certificate->title }}" />
                <div class="portfolio-layer">
                    <h4>{{ $certificate->title }}</h4>
                    <p>{{ $certificate->organization }}</p>
                    <a href="{{ asset('storage/' . $certificate->file_pdf) }}" download title="Download PDF"><i class='bx bx-download'></i></a>
                </div>
            </div>
        @empty
            <p class="text-center" style="grid-column: 1 / -1;">Belum ada sertifikat.</p>
        @endforelse
    </div>

    {{-- Tombol Kembali (BARU) --}}
    <div style="text-align: center; margin-top: 6rem;">
        <a href="{{ route('home') }}" class="btn">Back to Home</a>
    </div>
</section>
@endsection