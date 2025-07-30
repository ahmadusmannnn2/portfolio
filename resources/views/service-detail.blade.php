@extends('layouts.frontend')

@section('title', $service->title . ' | Ahmad Usman')

@section('content')
<section class="about" id="about">
    <div class="about-content" style="text-align: center;">
        {{-- Menambahkan inline style untuk memaksa rata tengah --}}
        <h2 class="heading" style="text-align: center;">{!! $service->title !!}</h2>
        
        <i class="{{ $service->icon_class }}" style="font-size: 8rem; color: var(--main-color); margin-bottom: 2rem;"></i>
        <div style="max-width: 800px; margin: 0 auto;">
            <p style="font-size: 1.8rem; line-height: 1.6;">
                {!! nl2br(e($service->long_description)) !!}
            </p>
        </div>
        <a href="{{ route('home') }}#services" class="btn" style="margin-top: 4rem;">Kembali ke Layanan</a>
    </div>
</section>
@endsection