@extends($theme::view('frame'))

{{-- meta(viewport) --}}
{{ app('xe.frontend')->meta()->name('viewport')->content(
    'width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'
)->load() }}

{{-- stylesheet --}}
{{ app('xe.frontend')->css([
    'assets/core/xe-ui-component/xe-ui-component.css',
    $theme::asset('css/owl.carousel.min.css'),
    $theme::asset('css/layout.css'),
    asset('https://cdn.jsdelivr.net/npm/xeicon@2.3/xeicon.min.css'),
])->load() }}

{{-- script --}}
{{ app('xe.frontend')->js([
    $theme::asset('js/owl.carousel.min.js'),
    $theme::asset('js/jquery.parallax-1.1.3.js'),
    $theme::asset('js/layout.js'),
])->load() }}

{{-- body class --}}
{{ app('xe.frontend')->bodyClass('desktop') }}
{{ app('xe.frontend')->bodyClass($config->get('colorset', '')) }}
{{ app('xe.frontend')->bodyClass($config->get('headerPosition', '')) }}
{{ app('xe.frontend')->bodyClass($config->get('headerColorset', '')) }}

@section('theme_content')
    <!--[D] 컨텐츠 가운데 고정형 옵션 선택의 경우 클래스 .xe-container 로 교체  -->
@include($theme::view($config->get('layout', 'main')))
@endsection

{{ app('xe.frontend')->html('alice.link')->content("
    <script>
    window.jQuery(function($) {
        $('.auth-toggle').click(function(e) {
            e.preventDefault();
            $('.plugin-area .toggle-menu').toggle()
        });

        // image menu event
        $('.__xe_menu_image').hover(function () {
            $(this).data('basic', $(this).attr('src'));
            $(this).attr('src', $(this).data('hover'));
        }, function () {
            $(this).attr('src', $(this).data('basic'));
        }).parent().css('padding', '0px');
    });
    </script>
")->load() }}
