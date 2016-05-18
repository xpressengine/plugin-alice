<li class="@if(!$menuItem->basicImage && $menuItem->isSelected())on @endif">
    <a href="{{ url($menuItem->url) }}" target="{{ $menuItem->target }}">
        @if($menuItem->basicImage)
            <span><img src="{{ $menuItem->isSelected() ? $menuItem->getSelectedImage() : $menuItem->basicImage }}" class="__xe_menu_image" data-hover="{{ $menuItem->getHoverImage() }}" /><span>
        @else
            <span>{{ xe_trans($menuItem->title) }}</span>
        @endif
    </a>
</li>
