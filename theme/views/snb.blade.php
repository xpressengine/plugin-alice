{{-- 사이드바 메뉴 (하위 메뉴는 재귀 출력) --}}
<ul>
    @foreach($items as $item)
    @php
        $hasChildren = count($item['children']) > 0;
        $itemClass = $hasChildren
            ? 'sub-item'.($item['selected'] ? ' open' : '')
            : ($item['selected'] ? 'on' : '');
    @endphp
    <li class="{{ $itemClass }}">
        <a href="{{ url($item['url']) }}" target="{{ $item['target'] }}">{{ $item['link'] }}</a>
        @if($hasChildren)
            <button type="button" class="snb-toggle" aria-label="하위 메뉴 펼치기/접기" aria-expanded="{{ $item['selected'] ? 'true' : 'false' }}"><i class="xi-plus"></i></button>
            @include($theme::view('snb'), ['items' => $item['children']])
        @endif
    </li>
    @endforeach
</ul>
