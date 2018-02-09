@section('spot')
    <div class="spot-area">
        <div id="owl-spot" class="owl-carousel">
            @if ($config->get('slide1Image.path'))
                <div class="item">
                    <div class="item-slide" style="background-image:url({{asset($config->get('slide1Image.path'))}})">
                        <div class="slide-text">
                            <div class="xe-container">
                                @if ($config->get('slide1Title'))<strong>{!! nl2br(xe_trans($config->get('slide1Title', ''))) !!}</strong>@endif
                                @if ($config->get('slide1Subtitle'))<p>{!! nl2br(xe_trans($config->get('slide1Subtitle', ''))) !!}</p>@endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($config->get('slide2Image.path'))
                <div class="item">
                    <div class="item-slide" style="background-image:url({{asset($config->get('slide2Image.path'))}})">
                        <div class="slide-text">
                            <div class="xe-container">
                                @if ($config->get('slide2Title') != '')<strong>{!! nl2br(xe_trans($config->get('slide2Title', ''))) !!}</strong>@endif
                                @if ($config->get('slide2Subtitle') != '')<p>{!! nl2br(xe_trans($config->get('slide2Subtitle', ''))) !!}</p>@endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($config->get('slide3Image.path'))
                <div class="item">
                    <div class="item-slide" style="background-image:url({{asset($config->get('slide3Image.path'))}})">
                        <div class="slide-text">
                            <div class="xe-container">
                                @if ($config->get('slide3Title') != '')<strong>{!! nl2br(xe_trans($config->get('slide3Title', ''))) !!}</strong>@endif
                                @if ($config->get('slide3Subtitle') != '')<p>{!! nl2br(xe_trans($config->get('slide3Subtitle', ''))) !!}</p>@endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

<div id="content" class="@if ($config->get('mainContentsAreaType', 'extend') == 'extend') xe-container-fluid @else xe-container @endif">
{!! $content !!}
</div>

{{ app('xe.frontend')->html('alice.carousel')->content("
<script>
    jQuery(function($) {
        $('#owl-spot').owlCarousel({
            nav:true,
            loop:true,
            items:1,
            responsive : {
                0 : {
                    nav: false,
                },
                768 : {
                }
            }
        })

        $('#owl-color').owlCarousel({
            loop:true,
            items:1,
            animateOut:'fadeOut',
            animateIn: 'fadeIn',
            mouseDrag:false,
            touchDrag:false
        })

        $('#owl-mobile').owlCarousel({
            items:1,
            touchDrag:false,
            mouseDrag:false,
            touchDrag:false,
            loop:true,
            responsive : {
                0 : {
                    mouseDrag:true,
                    touchDrag:true,
                },
                768 : {
                }
            }
        })

        $('#owl-tablet').owlCarousel({
            items:1,
            touchDrag:false,
            mouseDrag:false,
            touchDrag:false,
            loop:true
        })

        $('#owl-pc').owlCarousel({
            items:1,
            touchDrag:false,
            mouseDrag:false,
            touchDrag:false,
            loop:true
        })

        $('.num span').click(function(){
            $('#owl-color,#owl-mobile,#owl-tablet,#owl-pc').trigger('to.owl.carousel', $(this).index())
        });

        $(function(){
            $('.num span').click(function(){
                $('.num span').removeClass('on');
                var index = $(this).index();
                $(this).addClass('on');
            });
        });
    });
</script>
")->load() }}
