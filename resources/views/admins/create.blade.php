@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'admins.store']) !!}


    <div class="row">
  <div class="col">
    <input type="text" class="form-control" placeholder="First name" name="f_name" aria-label="First name">
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Last name" name="last_name" aria-label="Last name">
  </div>
</div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1"  class="form-label">Example textarea</label>
  <textarea class="form-control" id="exampleFormControlTextarea1"name="biography" rows="3"></textarea>
</div>

  <button type="submit" class="btn btn-primary">Create</button>

{!! Form::close() !!}





@endsection
