@inject('plugin', '\Xpressengine\Plugins\Alice\Plugin')

@extends('alice::views.theme')

@section('spot')
    <div class="sub-spot" style="background-image:url({{$config->get('subTopImagePath')}})">
        <div class="table-txt xe-container">
            <h2>{{ xe_trans($selectedMenu->title) }}</h2>
        </div>
    </div>
@endsection

@section('theme_content')
    <div id="sub-container" class="sub-container">
        <div class="@if ($config->get('subContentsAreaType', 'extend') == 'extend') xe-container-fluid @else xe-container @endif">
            {!! $content !!}
        </div>
    </div>
@endsection
