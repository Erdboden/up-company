<ul>
    @foreach($domains as $domain)
        <li>
            {{$domain->slug}}
        </li>
    @endforeach
</ul>