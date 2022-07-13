@extends('layouts.app')
@section('content')


<a href="{{ route('admins.index')}}" class="btn btn-primary">All admins</a>

<div class="card">
    <div class="card-header">
        Admin Details
    </div>
    <div class="card-body">
        <h5 class="card-title mb-3 bg-info">Name: {{$admin['f_name']}} {{$admin['last_name']}}</h5>
        <p class="card-text bg-info">email: {{$admin['email']}}</p>
        <p class="card-text bg-info">password: {{$admin['password']}}</p>
        <p class="card-text bg-info">biography: {{$admin['biography']}}</p>
    </div>
</div>



@endsection
