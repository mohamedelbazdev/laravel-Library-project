@extends('index')

@section('title')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit User</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9 col-12">
            <h3>Edit {{$edit['name']}} Info</h3>
                <a href="{{ route('users.index') }}" class="btn btn-primary mb-2 float-right">All Users</a>
                {!! Form::open(['route' => ['users.update', $edit->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::text('name', $edit['name'], ['class' => 'form-control mb-2']) !!}
                    {!! Form::email('email', $edit['email'], ['class' => 'form-control mb-2']) !!}
                    {!! Form::password('password', ['class' => 'form-control mb-2','placeholder' => 'Enter Your Password']) !!}
                </div>
                <br>

                {!! Form::submit('Edit User', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
