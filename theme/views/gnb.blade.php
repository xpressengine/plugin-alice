<ul class="nav-list">
    @foreach(menu_list($config->get('mainMenu')) as $menu)

    {{-- depth0 --}}
    <li class=" @if(count($menu['children'])) sub-menu @endif @if($menu['selected']) on @endif ">
        <a href="{{ url($menu['url']) }}" target="{{ $menu['target'] }}">
            {{ $menu['link'] }}
        </a>

        @if(count($menu['children']))
            <button type="button" class="nav-list-button"><i class="xi-caret-down-min"></i></button>
            <ul class="sub-menu-list">
                @foreach($menu['children'] as $menu1)
                    {{-- depth1 --}}
                    <li class=" @if(count($menu1['children'])) sub-menu @endif @if($menu1['selected']) on @endif ">
                        <a href="{{ url($menu1['url']) }}" target="{{ $menu1['target'] }}">
                            {{ $menu1['link'] }}
                        </a>
                        @if(count($menu1['children']))
                            <button type="button" class="nav-list-button"><i class="xi-caret-down-min"></i></button>
                            <ul class="sub-menu-list">
                                @foreach($menu1['children'] as $menu2)
                                    {{-- depth2 --}}
                                    <li class="@if(count($menu2['children'])) sub-menu @endif @if($menu2['selected']) on @endif ">
                                        <a href="{{ url($menu2['url']) }}" target="{{ $menu2['target'] }}">{{ $menu2['link'] }}</a>
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
