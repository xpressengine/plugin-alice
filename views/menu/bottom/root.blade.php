<div class="xe-col-sm-2">
    <h3><a href="{{ url($menuItem->url) }}">{{xe_trans($menuItem->title)}}</a></h3>
    @if($menuItem->hasChild() == true)
        <ul class="menu-list">
            @foreach($menuItem->getChildren() as $menuItemChild)
            @can('visible', [$menuItem, $menu])
                @include('alice::views.menu.bottom.common', ['menuItem' => $menuItemChild, 'menu' => $menu])
            @endcan
            @endforeach
        </ul>
    @endif
</div>
