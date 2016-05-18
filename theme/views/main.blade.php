@section('spot')
    <div class="spot-area">
        <div id="owl-spot">
            @if ($config->get('slide1ImagePath', '') != '')
                <div class="item">
                    <div class="item-slide" style="background-image:url({{$config->get('slide1ImagePath')}})">
                        <div class="slide-text">
                            <div class="xe-container">
                                @if ($config->get('slide1TitleText' ,'') != '')<strong>{!! xe_trans($config->get('slide1TitleText')) !!}</strong>@endif
                                @if ($config->get('slide1SubText' ,'') != '')<p>{!! xe_trans($config->get('slide1SubText')) !!}</p>@endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($config->get('slide2ImagePath', '') != '')
                <div class="item">
                    <div class="item-slide" style="background-image:url({{$config->get('slide2ImagePath')}})">
                        <div class="slide-text">
                            <div class="xe-container">
                                @if ($config->get('slide2TitleText' ,'') != '')<strong>{!! xe_trans($config->get('slide2TitleText')) !!}</strong>@endif
                                @if ($config->get('slide2SubText' ,'') != '')<p>{!! xe_trans($config->get('slide2SubText')) !!}</p>@endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($config->get('slide3ImagePath', '') != '')
                <div class="item">
                    <div class="item-slide" style="background-image:url({{$config->get('slide3ImagePath')}})">
                        <div class="slide-text">
                            <div class="xe-container">
                                @if ($config->get('slide3TitleText' ,'') != '')<strong>{!! xe_trans($config->get('slide3TitleText')) !!}</strong>@endif
                                @if ($config->get('slide3SubText' ,'') != '')<p>{!! xe_trans($config->get('slide3SubText')) !!}</p>@endif
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
