{{ XeFrontend::bodyClass(sprintf('body desktop %s %s %s %s',
$config->get('mainMenuTheme', ''),
$config->get('mainMenuFixPosition', ''),
$config->get('useColorSet', true) ? $config->get('colorSetValue', '') : '',
$config->get('subMenuThemeAndTopBanner', '')
))}}

<script>
    $ = XE.$;
</script>
<header>
    <div class="xe-container">
        <button class="btn-toggle" type="button">
            <span class="blind">Toggle nav-listigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar v2"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="brand-area">
            @if ($config->get('logoType', 'image') == 'text')
                <h1><a href="{{ url('/') }}" class="link-brand">{!! xe_trans($config->get('logoText', ''))!!}</a></h1>
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
                @foreach($mainMenu->getTree()->getTreeNodes() as $menuItem)
                @can('visible', [$menuItem, $mainMenu])
                <li class="@if($menuItem->isSelected())on @endif @if($menuItem->hasChild()) sub-menu @endif">
                    @if($menuItem->hasChild() === false)
                        <a href="{{ url($menuItem->url) }}"><span>{{ xe_trans($menuItem->title) }}</span></a>
                    @else
                        <a href="{{ url($menuItem->url) }}">{{ xe_trans($menuItem->title) }}<em class="ico-arrow"></em></a>
                        <ul class="sub-menu-list">
                            {{-- loop 2--}}
                            @foreach($menuItem->getChildren() as $menuItem2Depth)
                                @can('visible', $menuItem2Depth)
                                <li class="@if($menuItem2Depth->isSelected())on @endif @if($menuItem2Depth->hasChild()) sub-menu @endif">
                                    @if($menuItem2Depth->hasChild() === false)
                                        <a href="{{ url($menuItem2Depth->url) }}">{{ xe_trans($menuItem2Depth->title) }}</a>
                                    @else
                                        <a href="{{ url($menuItem2Depth->url) }}">{{ xe_trans($menuItem2Depth->title) }}<em class="ico-arrow"></em></a>
                                        <ul class="sub-menu-list">
                                            {{-- loop 3--}}
                                            @foreach($menuItem2Depth->getChildren() as $menuItem3Depth)
                                                @can('visible', $menuItem3Depth)
                                                <li class="@if($menuItem3Depth->isSelected())on @endif"><a href="{{ url($menuItem3Depth->url) }}">{{ xe_trans($menuItem3Depth->title) }}</a></li>
                                                @endcan
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endcan
                            @endforeach
                        </ul>
                    @endif
                </li>
                @endcan
                @endforeach
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
                        <h1><a href="{{ url('/') }}" class="link-brand">{!! xe_trans($config->get('footerLogoText', '')) !!}</a></h1>
                    @elseif ($config->get('footerLogoImagePath', '') != '')
                        <h1><a href="{{ url('/') }}"><img src="{{$config->get('footerLogoImagePath')}}"/></a></h1>
                    @endif
                </div>
                <p class="footer-text">
                    {!! xe_trans($config->get('footerContents')) !!}
                </p>
            </div>

            @foreach($subMenu->getTree()->getTreeNodes() as $subItem)
                @can('visible', [$subItem, $subMenu])
                <div class="xe-col-sm-2">
                    <h3><a href="{{ url($subItem->url) }}">{{xe_trans($subItem->title)}}</a></h3>
                    @if($subItem->hasChild() == true)
                        <ul class="menu-list">
                            @foreach($subItem->getChildren() as $subItem2Depth)
                                <li @if($subItem2Depth->isSelected()) class="on" @endif><a href="{{url($subItem2Depth->url)}}">{{xe_trans($subItem2Depth->title)}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                @endcan
            @endforeach

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

    });
</script>
