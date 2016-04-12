<li class="@if(!$menuItem->basicImage && $menuItem->isSelected())on @endif sub-menu">
    <a href="{{ url($menuItem->url) }}" target="{{ $menuItem->target }}">
        @if($menuItem->basicImage)
            <img src="{{ $menuItem->isSelected() ? $menuItem->getSelectedImage() : $menuItem->basicImage }}" class="__xe_menu_image" data-hover="{{ $menuItem->getHoverImage() }}" /><em class="ico-arrow"></em>
        @else
            {{ xe_trans($menuItem->title) }}<em class="ico-arrow"></em>
        @endif
    </a>
    <ul class="sub-menu-list">
        {{-- loop 2--}}
        @foreach($menuItem->getChildren() as $menuItemChild)
            @can('visible', [$menuItemChild, $mainMenu])

            @if($menuItemChild->hasChild() === false)
                @include('alice::views.menu.top.leaf', ['menuItem' => $menuItemChild, 'menu' => $mainMenu])
            @else
                @include('alice::views.menu.top.common', ['menuItem' => $menuItemChild, 'menu' => $mainMenu])
            @endif

            @endcan
        @endforeach
    </ul>
</li>
