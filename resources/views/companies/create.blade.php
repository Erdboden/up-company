@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register a new company</div>

                    <div class="panel-body">

                        <form action="/companies" method="POST">
                            {{csrf_field()}}


                            <div class="form-group">
                                <label for="channel_id">Choose a domain:</label>
                                <select class="form-control" type="text" class="form-control" id="domain_id"
                                        name="domain_id" required>
                                    <option value="">Choose one</option>

                                    @foreach($domains as $domain)
                                        <option value="{{$domain->id}}"{{old('channel_id') == $domain->id ? 'selected' : ''}}>
                                            {{$domain->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Company name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{old('name')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="country">Country:</label>
                                <input type="text" class="form-control" id="country" name="country"
                                       value="{{old('country')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city" name="city"
                                       value="{{old('city')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="street">Street:</label>
                                <input type="text" class="form-control" id="street" name="street"
                                       value="{{old('street')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="photo">Image (link):</label>
                                <input type="file" class="form-control" id="photo" name="photo"
                                       value="{{old('photo')}}" required>
<!--                                --><?//= Form::file('photo') ?>
                            </div>

                            <div class="form-group">
                                <label for="slogan">Slogan:</label>
                                <textarea name="slogan" class="form-control" id="slogan" rows="8"
                                          required>{{old('slogan')}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                            @if(count($errors))
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection