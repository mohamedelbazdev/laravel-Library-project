@extends('layouts.app')


@section('content')
    <h1>{{$book['name']}}</h1>
    <div class="contaner" style="margin-left: 50px;margin-top:20px;">
        <div class="row">
            <div class="col-md-9">
                {!! Form::open([
                    'route' => ['books.update', $book->id],
                    'method' => 'PUT',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="form-group">
                    <label for="name">Book</label>
                    {{ Form::text('name', $book['name'], ['class'=>'form-control','id'=>'name']) }}
                    <label for="Description">Description</label>
                    {{ Form::textarea('desc', $book['desc'], ['class'=>'form-control','id'=>'desc']) }}

                    <label for="category_id">Category</label>
                    {{ Form::select('category_id',$categories, $book['category_id'], ['class'=>'form-control select2','id'=>'category_id']) }}
                    
                    <label for="image">image</label>
                    {{ Form::file('image',['class'=>'form-control','id'=>'image']) }}
                </div>
                <br>

                {!! Form::submit('update book!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection