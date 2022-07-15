@extends('site.layouts.site')

@section('pageContent')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">

        
        @if($favourites->count() > 0)

        @else

            <h4>there is no books in your Favourites </h4>

        @endif

        </div>
    </div>
</div>



@endsection