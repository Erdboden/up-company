@extends('layouts.app')

@section('content')
    <company-view inline-template>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="level">
                            <span class="flex">
                        <h4>{{$company->name}}</h4>
                                </span>
                            <img src="{{$company->main_image_path}}">
                        </div>
                    </div>
                    <div class="panel-body">
                        {{$company->slogan}}
                    </div>
                    <hr>
                    <div class="panel-body">
                        <portfolio></portfolio>
                    </div>
                </div>
            </div>
            <div class="col-md-2 company-details">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="text-center">General information
                        <ul>
                            <li>Origin: <b>{{$company->city}}, {{$company->country}}, {{$company->street}}</b></li>
                            <li>Owner:<b> {{$company->owner->name}}</b></li>
                            <li>Area of activity: <b>{{$company->domain->name}}</b></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </company-view>
@endsection