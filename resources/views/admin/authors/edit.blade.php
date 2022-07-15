@extends('index')

@section('title')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger text-bold">Edit author</h1>
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
                <a href="{{ route('authors.index') }}" class="btn btn-primary mb-2 float-right">All Users</a>
                {!! Form::open(['route' => ['authors.update', $edit->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    <label for="exampleInputName">authors</label>
                    {!! Form::text('name', $edit['name'], ['class' => 'form-control mb-2']) !!}
                    {!! Form::email('email', $edit['email'], ['class' => 'form-control mb-2']) !!}
                    {!! Form::password('password', null, ['class' => 'form-control mb-2','placeholder' => 'Enter Your Password']) !!}
                    <input type="number" name="book_id" value="book_id" class="form-control"placeholder="Enter Your book_id">
                     <!-- {!! Form::password('book_id', ['class' => 'form-control mb-2','placeholder' => 'Enter Your book_id']) !!} -->
                </div>
                <br>

                {!! Form::submit('Edit author', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
