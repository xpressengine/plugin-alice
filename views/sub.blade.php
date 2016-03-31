@inject('plugin', '\Xpressengine\Plugins\Alice\Plugin')

@extends('alice::views.theme')

@section('spot')
    <div class="sub-spot" style="background-image:url({{$config->get('subTopImagePath')}})">
        <div class="table-txt xe-container">
            <h2>{{ xe_trans($selectedMenu ? $selectedMenu->title : '') }}</h2>
        </div>
    </div>
@endsection

@section('theme_content')
    <div id="sub-container" class="sub-container">
        <div class="@if ($config->get('subContentsAreaType', 'extend') == 'extend') xe-container-fluid @else xe-container @endif">
            <!-- snb -->
            <div class="xe-col-sm-3 snb">
                @section('subLeft')
                @show
                {{--<h3>CATEGORIES</h3>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">포럼</a></li>--}}
                    {{--<li class="sub-item open">--}}
                        {{--<a href="#">제작의뢰 <i class="xi-plus"></i></a>--}}
                        {{--<ul>--}}
                            {{--<li><a href="#">회사소개</a></li>--}}
                            {{--<li><a href="#">쇼핑몰</a></li>--}}
                            {{--<li class="on"><a href="#">포트폴리오</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="sub-item">--}}
                        {{--<a href="#">묻고 답하기 <i class="xi-plus"></i></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#">웹마스터 팁</a></li>--}}
                {{--</ul>--}}
            </div>
            <div class="xe-col-sm-9 sub-content">
                {!! $content !!}
            </div>
        </div>
    </div>
@endsection
