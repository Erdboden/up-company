@extends('layouts.app')

@section('content')
    <company-view :data="{{$company}}" image="{{$company->photo->url('thumb')}}"></company-view>
@endsection