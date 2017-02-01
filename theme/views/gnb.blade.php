<ul class="nav-list">
    @foreach(menu_list($config->get('mainMenu')) as $menu)

    {{-- depth0--}}
    <li class=" @if(count($menu['children'])) sub-menu @endif @if($menu['selected']) on @endif ">
        <a href="{{ url($menu['url']) }}">
            {{ $menu['link'] }}
            @if(count($menu['children'])) <em class="ico-arrow"></em> @endif
        </a>

        @if(count($menu['children']))
            <ul class="sub-menu-list" style="display: none;">
                @foreach($menu['children'] as $menu1)
                    {{-- depth1 --}}
                    <li class=" @if(count($menu1['children'])) sub-menu @endif @if($menu1['selected']) on @endif ">
                        <a href="{{ url($menu1['url']) }}">
                            {{ $menu1['link'] }}
                            @if(count($menu1['children'])) <em class="ico-arrow"></em> @endif
                        </a>

                        @if(count($menu1['children']))
                            <ul class="sub-menu-list" style="display: none;">
                                @foreach($menu1['children'] as $menu2)
                                    {{-- depth2 --}}
                                    <li class="@if(count($menu2['children'])) sub-menu @endif @if($menu2['selected']) on @endif ">
                                        <a href="{{ url($menu2['url']) }}">{{ $menu2['link'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
    @endforeach
</ul>
