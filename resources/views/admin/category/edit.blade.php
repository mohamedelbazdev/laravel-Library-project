@extends('layouts.app')


@section('content')
    <h1>Update Category</h1>
    <div class="contaner" style="margin-left: 50px;margin-top:20px;">
        <div class="row">
            <div class="col-md-9">
                {!! Form::open([
                    'route' => ['category.update', $category->id],
                    'method' => 'PUT',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="form-group">
                    <label for="exampleInputName">Category</label>
                    {!! Form::text('Catname', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Enter Category Name',
                        'value' => $category->Catname,
                    ]) !!}
                </div>
                <br>

                {!! Form::submit('update Category!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
