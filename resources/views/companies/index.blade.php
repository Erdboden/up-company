@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @forelse($companies as $company)
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <div class="level">
                                <h4 class="flex">
                                    <a href="{{$company->path()}}">
                                        {{$company->name}}
                                    </a>
                                </h4>
                                <img src="{{$company->main_image_path}}">
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="level">
                                <div class="body">{{$company->slogan}}</div>
                                <ul>
                                    <li>Origin: <b>{{$company->city}}, {{$company->country}}, {{$company->street}}</b>
                                    </li>
                                    <li>Owner:<b> {{$company->owner->name}}</b></li>
                                    <li>Area of activity: <b>{{$company->domain->name}}</b></li>
                                </ul>
                            </div>
                            <hr>
                        </div>
                    </div>
                @empty
                    <p>There are no relevant results at this time.</p>
                @endforelse

            </div>
        </div>
    </div>

@endsection