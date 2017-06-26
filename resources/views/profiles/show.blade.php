@extends('layouts.app')

@section('content')
    <profile-view :domains="{{$domains}}"></profile-view>
@endsection