@extends('index')

@section('title')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger text-bold">Create User</h1>
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
                <a href="{{ route('users.index') }}" class="btn btn-primary mb-2 float-right">All Users</a>
                {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    <label for="exampleInputName">Users</label>
                    {!! Form::text('name', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Your Name']) !!}
                    {!! Form::email('email', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Your Email']) !!}
                    {!! Form::password('password', ['class' => 'form-control mb-2','placeholder' => 'Enter Your Password']) !!}

                </div>
                <br>

                {!! Form::submit('Add User', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
