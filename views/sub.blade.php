@inject('plugin', '\Xpressengine\Plugins\Alice\Plugin')

@extends('alice::views.theme')

@section('spot')

<!-- Swiper -->
<div class="sub_spot" style="background-image:url({{ $config['sub_bgPath'] }})">
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
    @if($config['no_snb'] !== 'no_snb')
    <div class="col m12 l3 snb_area">
        <aside id="categories-2" class="widget card-panel widget_categories">
            <div class="card-content grey-text"><h5 class="card-title light">{{ $config['sidemenu_title'] }}</h5>
                <ul>
                    @if(isset($sideMenu) && is_array($sideMenu))
                    @foreach($sideMenu as $menuItem)
                        @if($menuItem->activated === 1 && $menuItem->checkVisiblePermission(Auth::user()))
                    <li class="cat-item cat-item-10"><a href="{{ url($menuItem->url) }}">{{ xe_trans($menuItem->title) }}<i class="xi-angle-right-thin"></i></a></li>
                        @endif
                    @endforeach
                    @endif
                </ul>
            </div>
        </aside>
    </div>
    @endif

    <div class="main_content col m12 {{ $config['no_snb'] !== 'no_snb' ? 'l9' : 'l12' }}">
        <div class="card">
            {!! $content !!}
        </div>
    </div>
</div>


@endsection
