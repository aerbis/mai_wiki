@if(count((array)$pages))
    @foreach($pages as $page)
        <ul>
            <li class="text-white"> 
                @if ($page->id == $currentpageid) 
                <a href="/page/{{ $page->id }}" class="link-succses link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $page->title }}</a>
                @else
                <a href="/page/{{ $page->id }}" class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $page->title }}</a> 
                @endif 
            </li>
            @if(count((array)$page->childPages))
                @include('navigation.child-page-list',['pages'=>$page->childPages])
            @endif
        </ul>
    @endforeach
 @endif