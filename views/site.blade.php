@inject('plugin', '\Xpressengine\Plugins\Alice\Plugin')

@extends('alice::views.theme')

@section('spot')

<!-- Swiper -->
<div class="sub_spot">
    <div class="txt_area">
        <div class="txt_wrap">
            @section('page_header')
            @if($selectedMenu)
                <div>
                    <h1>{{ xe_trans($selectedMenu->title) }}</h1>
                    <p>{{ xe_trans($selectedMenu->description) }}</p>
                </div>
            @endif
            @show
        </div>
    </div>
</div>
@endsection

@section('theme_content')
    <div class="row">
        <div class="main_content col l12 s12">
            <div class="card">
                {!! $content !!}
            </div>
        </div>
    </div>
@endsection
