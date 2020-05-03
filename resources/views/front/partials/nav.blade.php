@foreach($pages as $page)
    <li class="front__navbar--item">
        <a href="{{ $page->slug }}" class="front__navbar--link">
            {{ $page->title }}
        </a>
    </li>
@endforeach
