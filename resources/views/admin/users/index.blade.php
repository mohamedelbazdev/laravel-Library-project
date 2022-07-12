@extends('index')

@section('title')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger text-bold">Users Page</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-secondary">Users Data</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-2 float-right">Add New User</a>
            <thead class="bg-danger text-white">
                <th>No..</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Operations</th>
            </thead>
            <tbody>
            @foreach ($user as $key => $user)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                        <form class="d-inline" action="{{ url('/users/' . $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
