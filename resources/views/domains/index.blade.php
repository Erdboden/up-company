@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($domains as $index => $domain)
                @if($index%5==0)
                    <div class="col-md-6">
                        <ul>
                            @endif
                            <li><a href="{{$domain->path()}}">{{$domain->name}} </a></li>
                            @if(($index+1)%5==0 && $index!=0)
                        </ul>
                        <hr>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection