@inject('plugin', '\Xpressengine\Plugins\Alice\Plugin')

@extends('alice::views.theme')

@section('spot')
    <!-- Swiper -->
<div class="spot_area">
    <div class="swiper-container swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"
                 style="background-image:url({{ $config['slide_img1Path'] }})"></div>
            <div class="swiper-slide">
                <div class="hide-on-small-and-up"
                     style="height:100%;background:url({{ $config['slide_img2Path'] }}) 50% 100% no-repeat;"></div>
                    @if(array_get($config, 'slide_videoPath', false))
                    <video id="headervideo" autoplay loop poster="{{ $config['slide_videoPath'] }}">
                        <source src="{{ $config['slide_videoPath'] }}" type="video/mp4">
                    </video>
                    @endif
            </div>
            <div class="swiper-slide"
                 style="background-image:url({{ $config['slide_img3Path'] }})">
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white swiper-button-next1 swiper-button-white1" style="opacity:0"></div>
        <div class="swiper-button-prev swiper-button-white swiper-button-prev1 swiper-button-white1" style="opacity:0"></div>
    </div>
</div>
@endsection

@section('theme_content')
{!! $content !!}
@endsection
