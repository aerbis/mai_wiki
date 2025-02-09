@if(count((array)$pages))
    <ul>
        @foreach ($pages as $page)
            <li>
                @if ($page->id == $currentpageid) 
                <a href="/page/{{ $page->id }}" class="link-success link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $page->title }}</a>
                @else
                <a href="/page/{{ $page->id }}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $page->title }}</a> 
                @endif
            </li>
            @include('navigation.child-page-list',['pages'=>$page->childPages])
        @endforeach
    </ul>
@endif