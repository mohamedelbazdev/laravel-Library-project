@extends('layouts.app')

@section('content')
<a href="{{route('admin.create')}}" class="mx-auto btn btn-success">Create Admin</a>
<table class="table">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">f_name</th>
      <th scope="col">last_name</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">biography</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  @foreach($allAdmins as $info)
  <tbody>
    <tr>
      <th scope="row">{{$info->id}}</th>
      <td>{{$info ->f_name}}</td>
      <td>{{$info -> last_name}}</td>
      <td>{{$info -> email}}</td>
      <td>{{$info -> password}}</td>
      <td>{{$info -> biography}}</td>

      <td class="col">
        <a href="{{ route('admins.show',['admin' => $info['id']])}}" class="btn btn-info">View</a>
        <a href="{{ route('admins.destroy',['admin' => $info['id']])}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>

  </tbody>
  @endforeach
</table>
@endsection
