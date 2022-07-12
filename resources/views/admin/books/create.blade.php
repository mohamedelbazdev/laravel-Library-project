@extends('layouts.app')


@section('content')
    <h1>Craete Book</h1>
    <a href="{{ route('books.index') }}" class="btn btn-primary" style="margin-left: 900px">All Books</a>
    <div class="container" style="margin-left: 50px;margin-top:20px;">
        <div class="row">
            <div class="col-md-9">
                {!! Form::open(['route' => 'books.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    <label for="name">Book Name</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Book Name']) !!}
                    <label for="desc"> Description</label>
                    {!! Form::textarea('desc', null, ['class' => 'form-control', 'placeholder' => ' Book Description']) !!}
                    <label for="image"> image</label>
                    {!! Form::file('image', null, ['class' => 'form-control', 'placeholder' => 'upload image']) !!}
                    <br>
                    <label for="categories"> Category</label>
                    {{ Form::select('category_id',$categories, null, ['class'=>'form-control select2','id'=>'category_id']) }}
                                               
                </div>
                <br>

                {!! Form::submit('Add Book!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection