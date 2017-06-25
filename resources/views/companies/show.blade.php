@extends('layouts.app')

@section('content')
    <company-view :data="{{$company}}"></company-view>
@endsection