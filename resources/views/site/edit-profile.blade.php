@extends('site.layouts.site')

@section('pageContent')
<div class="container">

    <h1>Welcome {{Auth::user()->name}}</h1>
    <div class="row">
        <div class="col-md-9 col-12">
                <form method="POST" action="{{url('site/profile-update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name"  value="{{Auth::user()->name}}">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" >
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
