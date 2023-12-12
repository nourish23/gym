@extends('layouts.main')
<style>
    .whatsapp-button {
        position: fixed;
        bottom: 64px;
        right: 20px;
        z-index: 9999;
    }
</style>
@section('content')
@php $locale = App::getLocale(); @endphp
<div class="main-banner" id="top">
    <div class="video-container">
        <video autoplay muted loop playsinline id="bg-video" controls>
            <source src="{{ asset('/assets/videos/intro.mp4') }}" type="video/mp4" />
        </video>
        <div id="volume-control">
            <i id="volume-icon" class="fa fa-volume-up" hidden></i>
        </div>
    </div>
    
    <div class="centered-button">
        <a href="{{url('/userregister')}}" type="button" class="free-trial" onclick="return gtag_report_conversion('{{url('/userregister')}}');">Start Your 7 Days Free Trial</a>
    </div>
</div>

<div id="services" class="sec-2m">
    <!-- data-aos="fade-up" -->

    <div class="row col-10 mt-5">
        <div class="col-12 sec8 aos-init aos-animate d-flex flex-wrap justify-content-start flex-column " data-aos="fade-up" data-aos-delay="200">
            <h2 class="">
                @lang('landing.sections.services_label')
            </h2>
            <p class="mb-5">
                @lang('landing.sections.services_text')
            </p>
        </div>
    </div>
    <div class="row">
        @foreach ($data['services'] as $service)
        <div class="col-md-3 mb-4">
            <div class="card card-sec8">
                <div class="card__thumb">
                    <a href="#services"><img src="{{ url($service->image) }}" alt="sec8" /></a>
                </div>
                <div class="card__body">
                    <h2 class="card__title"><a href="#services">{{ $service->getTranslation('title', $locale, true) }} </a></h2>
                    <p class="card__description">
                        {{ $service->getTranslation('text', $locale, true) }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ***** Our Classes Start ***** -->
<section class="section" id="our-classes">
    <div class="container classes-padding" data-aos="fade-up" data-aos-delay="600">
        <div class="row">
            <div class="col-6 sec8">
                <h2 class="mb-4" style="color:#9a77aa">@lang('landing.sections.classes_label') </h2>
                <p style="margin-bottom: 15px;color:#767070;">@lang('landing.sections.classes_text')</p>
            </div>
        </div>
        <div class="row" id="tabs">
            <div class="col-lg-6">
                <ul>
                    @foreach ($data['classes'] as $key => $classItem)
                    <li>
                        <a href='#tabs-{{ $key }}'>
                            {{ $classItem->getTranslation('title', $locale, true) }}
                        </a>
                    </li>
                    @endforeach

                    <li style="display: none;"><a href=''></a></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <section class='tabs-content'>

                    @foreach ($data['classes'] as $key => $classItem)
                    <article id='tabs-{{ $key }}'>
                        <img src="{{ $classItem->thumbnail_url }}" alt="{{ $classItem->getTranslation('title', $locale, true) }}" />
                        <h4>{{ $classItem->getTranslation('title', $locale, true) }}</h4>
                        <p>{{ $classItem->getTranslation('description', $locale, true) }}</p>
                    </article>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</section>
<!-- ***** Our Classes End ***** -->


<!-- ======= class selection Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up" data-aos-delay="600">
        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('/assets/img/selection.jpg') }}" class="img-fluid" alt="">
                <a href="{{ asset('/assets/videos/video motion v1.mp4') }}" class="glightbox btn-watch-video d-flex align-items-center play-btn mb-4" data-vbtype="video" data-autoplay="true">
                </a>
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                <div class="section-title">
                    <h2>@lang('landing.sections.classes_sections_label')</h2>
                    <p>@lang('landing.sections.classes_sections_text')</p>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- class selection Section -->


<!-- ======= Team Section ======= -->
<section id="coach" class="trainer-section overflow-hidden spad">
    <div class="container" data-aos="fade-up" data-aos-delay="200">
        <div class="row">
            <div class="col-12 sec8">
                <h2 class="mb-4">@lang('landing.sections.coaches_label') </h2>
                <p style="color:#767070;font-size: 17px;">@lang('landing.sections.coaches_text') </p>
            </div>
        </div>
        <div class="trainer-slider owl-carousel">
            @foreach ($data['coaches'] as $coache)
            <div class="ts-item">
                <div class="trainer-item">
                    <div class="ti-img">
                        <img class="farah" src='{{ url($coache->image_url) }}' alt="">
                    </div>
                    <div class="ti-text">
                        <h4>{{ $coache->getTranslation('name', $locale, true) }}</h4>
                        <h6>
                            {{ $coache->getTranslation('brief', $locale, true) }}
                        </h6>
                        <p>{!! $coache->getTranslation('description', $locale, true) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Team Section -->


<!-- ======= Testimonials Section ======= -->
<section id="review" class="review-section spad set-bg" style="background: url({{ url('assets/img/review-bg.jpg') }}" );>
    <div class="container" data-aos="fade-up" data-aos-delay="600">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="review-slider owl-carousel">

                    @foreach ($data['reviews'] as $key => $review)
                    <div class="review-item">
                        {{-- <div class="ri-img">
                                    <img src="{{ asset('assets/img/team-1.jpg') }}" alt="">
                    </div> --}}
                    <div class="ri-text text-white">
                        <p>{!! $review->getTranslation('text', $locale, true) !!}</p>
                        <h4>
                            {{ $review->getTranslation('name', $locale, true) }}
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Testimonials Section -->

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing mt-5 pricingTable">
    <div class="container" data-aos="fade-up">

        <div class="row price-header">
            <div class="col-12 sec8">
                <h2 class="" style="color: #767070;">@lang('landing.sections.pricing_label')</h2>
                <p class="mb-5" style="color: #767070;">@lang('landing.sections.pricing_text')</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="200">
                <div class="switcher d-flex align-items-center">
                    <ul class="d-flex justify-content-around align-items-center w-100">
                        <li class="d-flex justify-content-around align-items-center py-0">
                            <p id="monthly" class="active text-center">
                                {{ $data['categories'][0]->getTranslation('title', $locale, true) }}
                            </p>
                        </li>
                        <li class="d-flex justify-content-around align-items-center py-0">
                            <p id="sixMonth">{{ $data['categories'][1]->getTranslation('title', $locale, true) }}
                            </p>
                        </li>
                        <li class="d-flex justify-content-around align-items-center py-0">
                            <p id="yearly" class="">
                                {{ $data['categories'][2]->getTranslation('title', $locale, true) }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row gy-4 all-pricing monthlyPriceList animated">
            @foreach ($data['plans']->where('category_id', 1) as $item)
            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="pricing-item inner holder">

                    <div class="pricing-header">
                        <h4>{{ $item->title }}</h4>
                        <div style="display: flex;flex-direction: row; align-items:center;">
                        <h2 class="old-price" style="text-decoration: line-through;color: #4b4848;font-size: 27px;text-align: initial;margin: 9px;">{{ $item->old_price }}</h2>
                        <h4>{{ $item->price }}<sup>@lang('landing.pricing_sec.aed')</sup></h4>
                        </div>
                    </div>

                    <ul>
                        <li><i class="bi bi-dot"></i> <span>@lang('landing.category_1.feature_1')</span></li>
                        <li><i class="bi bi-dot"></i> <span>@lang('landing.category_1.feature_2')</span></li>
                        <li class="na"><i class="bi bi-x"></i> <span>@lang('landing.category_1.feature_3')</span>
                        </li>
                    </ul>

                    <div class="text-center mt-auto">
                        <a href="/userregister" class="buy-btn">@lang('landing.pricing_sec.subscribe')</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Pricing Item -->
        </div>
        <div class="row gy-4 all-pricing sixMonthPriceList d-none animated d-none">
            @foreach ($data['plans']->where('category_id', 2) as $item)
            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="pricing-item inner holder">
                    <div class="pricing-header">
                        <h4>{{ $item->title }}</h4>
                        <div style="display: flex;flex-direction: row; align-items:center;">
                        <h2 class="old-price" style="text-decoration: line-through;color: #4b4848;font-size: 27px;text-align: initial;margin: 9px;">{{ $item->old_price }}</h2>
                        <h4>{{ $item->price }}<sup>@lang('landing.pricing_sec.aed')</sup></h4>
                        </div>
                    </div>
                    <ul>
                        <li><i class="bi bi-dot"></i> <span>@lang('landing.category_2.feature_1')</span></li>
                        <li class="na"><i class="bi bi-x"></i> <span>@lang('landing.category_2.feature_2')</span></li>
                        <li class="na"><i class="bi bi-x"></i> <span>@lang('landing.category_2.feature_3')</span></li>
                    </ul>
                    <div class="text-center mt-auto">
                        <a href="/userregister" class="buy-btn">@lang('landing.pricing_sec.subscribe')</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Pricing Item -->
        </div>

        <div class="row gy-4 all-pricing yearlyPriceList d-none animated">

            @foreach ($data['plans']->where('category_id', 3) as $item)
            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="pricing-item inner holder">
                    <div class="pricing-header">
                        <h4>{{ $item->title }}</h4>
                        <div style="display: flex;flex-direction: row; align-items:center;">
                        <h2 class="old-price" style="text-decoration: line-through;color: #4b4848;font-size: 27px;text-align: initial;margin: 9px;">{{ $item->old_price }}</h2>
                        <h4>{{ $item->price }}<sup>@lang('landing.pricing_sec.aed')</sup></h4>
                        </div>
                    </div>
                    <ul>
                        <li><i class="bi bi-dot"></i> <span>@lang('landing.category_3.feature_1')</span></li>
                        <li><i class="bi bi-dot"></i> <span>@lang('landing.category_3.feature_2')</span></li>
                        <li><i class="bi bi-dot"></i> <span>@lang('landing.category_3.feature_3')</span></li>
                    </ul>
                    <div class="text-center mt-auto">
                        <a href="/userregister" class="buy-btn">@lang('landing.pricing_sec.subscribe')</a>
                    </div>

                </div>
            </div>
            @endforeach
            <!-- End Pricing Item -->
        </div>
    </div>
</section><!-- End Pricing Section -->

<a href="https://wa.me/+971561976784" target="_blank" class="whatsapp-button" onclick="gtag_report_conversion('https://wa.me/+971561976784')">
    <img src="{{ asset('/assets/img/whatsapp.png') }}" alt="WhatsApp Icon" width="70" height="65">
</a>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() >
                100) { // Adjust the value based on when you want the button to appear
                $('.whatsapp-button').fadeIn();
            } else {
                $('.whatsapp-button').fadeOut();
            }
        });
    });

</script>
<script>
    function gtag_report_conversion(url) {
      var callback = function () {
        if (typeof(url) != 'undefined') {
          window.location = url;
        }
      };
      gtag('event', 'conversion', {
          'send_to': 'AW-11326292689/_XW6CIzxpN0YENGF5pgq',
          'event_callback': callback
      });
      return false;
    }
    </script>
<script>
    const video = document.getElementById('bg-video');
    const volumeIcon = document.getElementById('volume-icon');
    function toggleMute() {
        video.muted = !video.muted;
        updateVolumeIcon();
    }
    function updateVolumeIcon() {
        if (video.muted) {
            volumeIcon.classList.remove('fa-volume-up');
            volumeIcon.classList.add('fa-volume-off');
        } else {
            volumeIcon.classList.remove('fa-volume-off');
            volumeIcon.classList.add('fa-volume-up');
        }
    }
    video.addEventListener('click', toggleMute);
    volumeIcon.addEventListener('click', toggleMute);
    video.addEventListener('volumechange', updateVolumeIcon);
    updateVolumeIcon();
</script>

    
@endsection
