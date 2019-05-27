<header>
    <div class="xe-container">
        <button class="btn-toggle" type="button">
            <span class="blind">Toggle nav-listigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar v2"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="brand-area">
            <h1>
                <a href="{{ url('/') }}" class="link-brand">
                @if($config->get('logoImage.id'))
                    <img src="{{ \Xpressengine\Media\Models\Image::find($config->get('logoImage.id'))->url() }}" alt="{{ xe_trans($config->get('logoText', '')) }}"/>
                @else
                    {!! xe_trans($config->get('logoText', 'Alice')) !!}
                @endif
                </a>
            </h1>
        </div>
        <div class="plugin-area">
            <ul>
                @if(auth()->user()->isAdmin())
                <li><a href="{{ route('settings') }}" class="plugin"><i class="xi-cog"></i></a></li>
                @endif
                <li>
                    <a href="#" class="plugin auth-toggle"><i class="xi-user"></i></a>
                    <ul class="toggle-menu">
                        @if(Auth::check())
                            <li><a href="{{ route('user.profile', ['user' => auth()->id()]) }}">{{ xe_trans('xe::myProfile') }}</a></li>
                            <li><a href="{{ route('user.settings') }}">{{ xe_trans('xe::mySettings') }}</a></li>
                            <li><a href="{{ route('logout') }}">{{ xe_trans('xe::logout') }}</a></li>
                        @else
                            <li><a href="{{ route('login') }}">{{ xe_trans('xe::login') }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        <nav>
            @include($theme::view('gnb'))
        </nav>
    </div>
</header>

@section('spot')
@show

<!--[D] 컨텐츠 가운데 고정형 옵션 선택의 경우 클래스 .xe-container 로 교체  -->
@section('theme_content')
@show

<div class="footer">
    <div class="xe-container">
        <div class="xe-row">
            <div class="xe-col-sm-3">
                <div class="brand-area">
                    <a href="{{ url('/') }}" class="link-brand">
                        @if($config->get('footerLogoImage.id'))
                            <img src="{{ \Xpressengine\Media\Models\Image::find($config->get('footerLogoImage.id'))->url() }}" alt="{{ xe_trans($config->get('footerLogoText', 'Alice')) }}"/>
                        @else
                            {!! xe_trans($config->get('footerLogoText', 'Alice')) !!}
                        @endif
                    </a>
                </div>
                <p class="footer-text">
                    {!! xe_trans($config->get('footerContents', '')) !!}
                </p>
            </div>

            @if($config->get('useFooterMenu', 'N') === 'Y')
            @include($theme::view('fnb'))
            @endif

            <div class="xe-col-sm-2 xe-col-xs-offset-1">
                <div class="link-area float-right">
                    @if($links = $config->get('footerLinkUrl'))
                    @foreach ($links as $index => $url)
                        <a href="{{$url}}"><i class="{{ $config->get("footerLinkIcon.$index") }}"></i></a>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="xe-container">
            <div class="xe-row">
                <div class="xe-col-sm-6">
                    <p>{{$config->get('copyright', '')}}</p>
                </div>
                <div class="xe-col-sm-6">

                    @if($config->get('useMultiLang', 'Y') === 'Y')
                    <div class="xe-form-group">
                        <div class="xe-dropdown ">
                            <button class="xe-btn" type="button" data-toggle="xe-dropdown"><i class="{{XeLang::getLocale()}} xe-flag"></i> {{ XeLang::getLocaleText(XeLang::getLocale()) }}</button>
                            <ul class="xe-dropdown-menu">
                                @foreach ( XeLang::getLocales() as $locale )
                                <li><a href="{{ locale_url($locale) }}"><i class="{{ $locale }} xe-flag" data-locale="{{ $locale }}"></i> {{ XeLang::getLocaleText($locale) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <p class="float-right">Made by <a href="http://xpressengine.io">XE</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
