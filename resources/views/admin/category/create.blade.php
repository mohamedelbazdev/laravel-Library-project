@extends('layouts.app')


@section('content')
    <h1>Create Category</h1>
    <a href="{{ route('category.index') }}" class="btn btn-primary" style="margin-left: 900px">All Categories</a>
    <div class="container" style="margin-left: 50px;margin-top:20px;">
        <div class="row">
            <div class="col-md-9">
                {!! Form::open(['route' => 'category.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    <label for="exampleInputName">Category</label>
                    {!! Form::text('Catname', null, ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) !!}
                </div>
                <br>

                {!! Form::submit('Add Category!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
