{{-- 사이드바: 표시 설정이 켜져 있고 출력할 메뉴가 있을 때만 노출 --}}
@php
    $sidebarItems = $config->get('sidebar') === 'use-snb' ? menu_list($config->get('sidebarMenu')) : [];
    $showSidebar = count($sidebarItems) > 0;
    $sidebarTitle = xe_trans($config->get('sidebarTitle', ''));
@endphp

{{-- body class --}}
{{ app('xe.frontend')->bodyClass($config->get('banner', 'no-spot')) }}
{{ app('xe.frontend')->bodyClass($showSidebar ? '' : 'no-snb') }}

@section('spot')
    @parent
    <div class="sub-spot"
        @if ($config->get('subTopImagePath', '') !== '')
        style="background-image:url({{$config->get('subTopImagePath', '')}})"
        @endif
    >
        <div class="table-txt xe-container">
            <h2>{{ data_get(current_menu(), 'title', '') }}</h2>
        </div>
    </div>
@endsection

<div id="sub-container" class="sub-container">
    <div class="{{ $config->get('contentAreaType') === 'xe-container' ? 'xe-container' : 'xe-container-fluid' }}">
        <div class="xe-row">
            @if ($showSidebar)
            <div class="xe-col-sm-3 snb">
                @section('subLeft')
                    @if ($sidebarTitle)
                    <h3>{{ $sidebarTitle }}</h3>
                    @endif
                    @include($theme::view('snb'), ['items' => $sidebarItems])
                @show
            </div>
            @endif
            <div class="{{ $showSidebar ? 'xe-col-sm-9' : 'xe-col-sm-12' }} sub-content">
                {!! $content !!}
            </div>
        </div>
    </div>
</div>
