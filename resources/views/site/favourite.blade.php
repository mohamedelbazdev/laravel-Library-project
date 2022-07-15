@extends('site.layouts.site')

@section('pageContent')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">

        
        @if($favourites->count() > 0)
        <div class="card-body">
           
            @foreach($favourites as $favourite)
            <div class="row book_data">
                <div class="col-md-2 my-auto">
                    <!-- <img src="{{URL::to('/'.$favourite->books->image)}}" class="col-md-2 my-auto"> -->
                    <img src="{{asset('/'.$favourite->books->image)}}" height="70px" width="70px" >

                </div>
                <div class="col-md-3">
                    <h6>{{$favourite->books->name}}</h6>
                    <input type="hidden"  class="book_id" value="{{$favourite->boo_id}}">
                </div>
                <div class="col-md-3">
                    <h6>{{$favourite->books->desc}}</h6>
                </div>
                <div class="col-md-2">
                <form action="{{route('fav.destroy',$favourite->id)}}" >
                                                    <!-- @method('DELETE') -->
                                                    @csrf
                    <button class="btn btn-danger"><i class="fa fa-trash"> </i>Remove</button>
                </form>
                </div>
            </div>
            @endforeach

        </div>

        @else

            <h4>there is no books in your Favourites </h4>

        @endif

        </div>
    </div>
</div>



@endsection