@extends('layouts.app')

@section('content')

<div class="box">
        <div class="box-header with-border">
            <div class="box-title">
                <h2>Our Books</h2>
            </div>
            <a href="{{ route('books.create') }}" class="btn btn-primary mb-2 float-right" style="margin-left: 900px">Add book</a>

        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Desc</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td style="width: 25%">{{ $loop->iteration }}</td>
                            <td style="width: 50%">{{ $book->name }}</td>
                            <td style="width: 50%"><img style="hight:100px;width:100px;margin:5px;"
                                                src="{{$book->image}}"></td>
                            <td style="width: 50%">{{ $book->desc }}</td>
                            <td style="width: 50%">
                            
                            {{optional($book->categories)->Catname}}
                          </td>
                          <td style="width: 50%">{{ $book->author }}</td>
                            <td>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{route('books.destroy',$book->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
        
                             <button class="btn default btn-sm bg-red" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
        
                                </form>


                            </td>
                        </tr>
                    @endforeach
                 
                </tbody>
            </table>
        </div>
    </div>

@endsection