<li class="{{ $item->children->isNotEmpty() ? 'menu-item-has-children' : '' }}">
    <a href="{{ url(Str::slug($item->name)) }}">{{ $item->name }}</a>

    @if($item->children->isNotEmpty())
        <ul class="sub-menu">
            @foreach($item->children as $child)
                @include('partials.menu-item', ['item' => $child])
            @endforeach
        </ul>
    @endif
</li>
