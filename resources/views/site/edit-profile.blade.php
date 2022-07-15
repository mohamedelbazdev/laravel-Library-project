@extends('site.layouts.site')

@section('pageContent')
<div class="container">

    <h1>Welcome</h1>
    <div class="row">
        <div class="col-md-9 col-12">
                {!! Form::open(['route' => ['site.edit-profile', $edit->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::text('name', $edit['name'], ['class' => 'form-control mb-2']) !!}
                    {!! Form::email('email', $edit['email'], ['class' => 'form-control mb-2']) !!}
                    {!! Form::password('password', ['class' => 'form-control mb-2','placeholder' => 'Enter Your Password']) !!}
                </div>
                <br>

                {!! Form::submit('Edit profile', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
