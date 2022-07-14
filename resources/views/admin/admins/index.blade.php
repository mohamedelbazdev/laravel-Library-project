@extends('index')

@section('title')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">All Admins</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@endsection

@section('content')

<div class="">
    <div class="card-body">
        <table class="table table-bordered">
            <a href="{{ route('admins.create') }}" class="btn btn-primary m-2 float-right">Add New Admin</a>
            <thead class="">
                <th>No..</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>ِAction</th>
            </thead>
            <tbody>
            @foreach ($admin as $key => $admin)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->password}}</td>
                    <td>
                        <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-success">Edit</a>
                        <form class="d-inline" action="{{ url('/admins/' . $admin->id) }}" method="POST">
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
