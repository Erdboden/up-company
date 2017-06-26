@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($domains as $index => $domain)
                {{--{{$index}}--}}
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

            {{----}}
            {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading">Dashboard</div>--}}

            {{--<div class="panel-body">--}}
            {{--You are logged in!--}}

            {{--<p class="text-center"><a href="/domains">Start viewing companies</a></p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection