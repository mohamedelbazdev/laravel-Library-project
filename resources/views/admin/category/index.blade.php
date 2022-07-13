@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <div class="box-title">
                <h2>Categories</h2>
            </div>
            <a href="{{ route('category.create') }}" class="btn btn-primary" style="margin-left: 900px">Add Category</a>

        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Category</th>
                        <th style="width: 40px">Label</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td style="width: 25%">{{ $loop->iteration }}</td>
                            <td style="width: 50%">{{ $category->Catname }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info">Edit</a>
                                <a href='' data-toggle="modal" data-target="#modal_single_del{{ $key }}"
                                    class='btn btn-danger m-r-1em'>Remove </a>


                            </td>
                        </tr>
                    @endforeach
                    <div class="modal" id="modal_single_del{{ $key }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">delete confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    Remove {{ $category->Catname }} !!!!
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ url('/category/' . $category->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <div class="not-empty-record">
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">close</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                </tbody>
            </table>
        </div>
    </div>
@endsection
