@foreach(menu_list($config->get('footerMenu')) as $menu)
<div class="xe-col-sm-2">
    <h3><a href="{{ url($menu['url']) }}">{{ $menu['link'] }}</a></h3>

    @if(count($menu['children']))
    <ul class="menu-list">
        @foreach($menu['children'] as $menu1)
        <li class="@if($menu1['selected']) on @endif "><a href="{{ url($menu1['url']) }}">{{ $menu1['link'] }}</a></li>
        @endforeach
    </ul>
    @endif
</div>
@endforeach
