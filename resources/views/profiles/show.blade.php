@extends('layouts.app')

@section('content')
    <profile-view :data="{{$userProfile}}"></profile-view>
@endsection