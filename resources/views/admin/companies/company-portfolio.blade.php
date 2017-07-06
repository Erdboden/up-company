<ul>
    @foreach($portfolio as $item)
        <li><a href="/cms/portfolios/{{$item->id}}">{{$item->title}}</a></li>
    @endforeach
</ul>