@section('spot')
    <div class="spot-area">
        <div id="owl-spot">
            @if ($config->get('slide1Image.path', '') != '')
                <div class="item">
                    <div class="item-slide" style="background-image:url({{$config->get('slide1Image.path')}})">
                        <div class="slide-text">
                            <div class="xe-container">
                                @if ($config->get('slide1Title' ,'') != '')<strong>{!! $config->get('slide1Title') !!}</strong>@endif
                                @if ($config->get('slide1Subtitle' ,'') != '')<p>{!! $config->get('slide1Subtitle') !!}</p>@endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($config->get('slide2Image.path', '') != '')
                <div class="item">
                    <div class="item-slide" style="background-image:url({{$config->get('slide2Image.path')}})">
                        <div class="slide-text">
                            <div class="xe-container">
                                @if ($config->get('slide2Title' ,'') != '')<strong>{!! $config->get('slide2Title') !!}</strong>@endif
                                @if ($config->get('slide2Subtitle' ,'') != '')<p>{!! $config->get('slide2Subtitle') !!}</p>@endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($config->get('slide3Image.path', '') != '')
                <div class="item">
                    <div class="item-slide" style="background-image:url({{$config->get('slide3Image.path')}})">
                        <div class="slide-text">
                            <div class="xe-container">
                                @if ($config->get('slide3Title' ,'') != '')<strong>{!! $config->get('slide3Title') !!}</strong>@endif
                                @if ($config->get('slide3Subtitle' ,'') != '')<p>{!! $config->get('slide3Subtitle') !!}</p>@endif
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
