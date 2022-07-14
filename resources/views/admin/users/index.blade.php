@extends('index')

@section('title')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">All Users</h1>
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
            <a href="{{ route('users.create') }}" class="btn btn-primary m-2 float-right">Add New User</a>
            <thead class="">
                <th>No..</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>ِAction</th>
            </thead>
            <tbody>
            @foreach ($user as $key => $user)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                        @if ($user->status==1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>

                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                        <form class="d-inline" action="{{ url('/users/' . $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @if ($user->status==1)
                        <a href="{{ url('users/inactive/'. $user->id) }}" class="btn btn-danger">Inactive</a>
                        @else
                        <a href="{{ url('users/active/'. $user->id) }}" class="btn btn-success">Active</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // $("#user_table").dataTable()
    });
    $(function(){
        $(".toggle-class").change(function(){
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');
            $.ajax({
                type:"GET",
                dataType:"json",
                url: "/userStatus",
                data: {'status': status, 'user_id' :user_id},
                success: function(data){
                    console.log(data.success);
                }
            });
        });
    });
</script>

@endsection
