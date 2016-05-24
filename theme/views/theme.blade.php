@extends($theme::view('frame'))

{{-- stylesheet --}}
{{ app('xe.frontend')->css([
    $theme::asset('css/owl.carousel.css'),
    $theme::asset('css/layout.css'),
    'http://cdn.jsdelivr.net/xeicon/2.0.0/xeicon.min.css',
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
{{ app('xe.frontend')->bodyClass($config->get('banner', 'no-spot')) }}
{{ app('xe.frontend')->bodyClass($config->get('sidebar', 'no-snb')) }}

@section('theme_content')
    <!--[D] 컨텐츠 가운데 고정형 옵션 선택의 경우 클래스 .xe-container 로 교체  -->
@include($theme::view($config->get('layout', 'main')))
@endsection
