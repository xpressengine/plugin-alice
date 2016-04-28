{{ XeFrontend::bodyClass(sprintf('desktop %s %s %s %s',
$config->get('mainMenuTheme', ''),
$config->get('mainMenuFixPosition', ''),
$config->get('useColorSet', true) ? $config->get('colorSetValue', '') : '',
$config->get('subMenuThemeAndTopBanner', '')
))}}

<header>
    <div class="xe-container">
        <button class="btn-toggle" type="button">
            <span class="blind">Toggle nav-listigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar v2"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="brand-area">
            @if ($config->get('logoType', 'text') == 'text')
                <h1><a href="{{ url('/') }}" class="link-brand">{!! xe_trans($config->get('logoText', 'Alice'))!!}</a></h1>
            @elseif ($config->get('logoImagePath', '') != '')
                <h1><a href="{{ url('/') }}" class="link-brand"><img src="{{$config->get('logoImagePath')}}" /></a></h1>
            @endif
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
                            <li><a href="{{ route('member.profile', ['member' => auth()->id()]) }}">{{ xe_trans('xe::myProfile') }}</a></li>
                            <li><a href="{{ route('member.settings') }}">{{ xe_trans('xe::mySettings') }}</a></li>
                            <li><a href="{{ route('logout') }}">{{ xe_trans('xe::logout') }}</a></li>
                        @else
                            <li><a href="{{ route('login') }}">{{ xe_trans('xe::login') }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        <nav>
            <ul class="nav-list">
                {{-- loop 1--}}
                @if($mainMenu !== null)
                @foreach($mainMenu->getTree()->getTreeNodes() as $menuItem)
                    @can('visible', [$menuItem, $mainMenu])

                    @if($menuItem->hasChild() === false)
                        @include('alice::views.menu.top.leaf', ['menuItem' => $menuItem, 'menu' => $mainMenu])
                    @else
                        @include('alice::views.menu.top.common', ['menuItem' => $menuItem, 'menu' => $mainMenu])
                    @endif

                    @endcan
                @endforeach
                @endif
            </ul>
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
                    @if ($config->get('footerLogoType', 'image') == 'text')
                        <a href="{{ url('/') }}" class="link-brand">{!! xe_trans($config->get('footerLogoText', '')) !!}</a>
                    @elseif ($config->get('footerLogoImagePath', '') != '')
                        <a href="{{ url('/') }}"><img src="{{$config->get('footerLogoImagePath')}}"/></a>
                    @endif
                </div>
                <p class="footer-text">
                    {!! xe_trans($config->get('footerContents', '')) !!}
                </p>
            </div>

            @if($subMenu !== null)
            @foreach($subMenu->getTree()->getTreeNodes() as $subItem)
                @can('visible', [$subItem, $subMenu])

                @include('alice::views.menu.bottom.root', ['menuItem' => $subItem, 'menu' => $subMenu])

                @endcan
            @endforeach
            @endif

            <div class="xe-col-sm-2 xe-col-xs-offset-1">
                <div class="link-area float-right">
                    @foreach ($config->get('footerLink', []) as $footerLinkIndex => $footerLink)
                        <a href="{{$footerLink}}"><i class="{{$config->get('footerLinkIcon')[$footerLinkIndex]}}"></i></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="xe-container">
            <div class="xe-row">
                <div class="xe-col-sm-6">
                    <p>{{$config->get('copyRight', '')}}</p>
                </div>
                <div class="xe-col-sm-6">
                    <p class="float-right">Made by <a href="http://xpressengine.io">XE</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function($) {
        $('#owl-spot').owlCarousel({
            nav:true,
            loop:true,
            items:1,
            responsive : {
                0 : {
                    nav: false,
                },
                768 : {
                }
            }
        })

        $('#owl-color').owlCarousel({
            loop:true,
            items:1,
            animateOut:'fadeOut',
            animateIn: 'fadeIn',
            mouseDrag:false,
            touchDrag:false
        })

        $('#owl-mobile').owlCarousel({
            items:1,
            touchDrag:false,
            mouseDrag:false,
            touchDrag:false,
            loop:true,
            responsive : {
                0 : {
                    mouseDrag:true,
                    touchDrag:true,
                },
                768 : {
                }
            }
        })

        $('#owl-tablet').owlCarousel({
            items:1,
            touchDrag:false,
            mouseDrag:false,
            touchDrag:false,
            loop:true
        })

        $('#owl-pc').owlCarousel({
            items:1,
            touchDrag:false,
            mouseDrag:false,
            touchDrag:false,
            loop:true
        })

        $('.num span').click(function(){
            $('#owl-color,#owl-mobile,#owl-tablet,#owl-pc').trigger('to.owl.carousel', $(this).index())
        });

        $(function(){
            $('.num span').click(function(){
                $('.num span').removeClass('on');
                var index = $(this).index();
                $(this).addClass('on');
            });
        });

        $(".auth-toggle").click(function(e) {
            e.preventDefault();
            $(".plugin-area .toggle-menu").toggle()
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
