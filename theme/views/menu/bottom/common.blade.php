<li @if($menuItem->isSelected()) class="on" @endif>
    <a href="{{url($menuItem->url)}}">{{xe_trans($menuItem->title)}}</a>
    @if($menuItem->hasChild() == true)
        <ul class="menu-list">
            @foreach($menuItem->getChildren() as $menuItemChild)
            @can('visible', [$menuItem, $menu])
                @include('alice::views.menu.bottom.common', ['menuItem' => $menuItemChild, 'menu' => $menu])
            @endcan
            @endforeach
        </ul>
    @endif
</li>
