@extends('site.layouts.site')

@section('pageContent')
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">


                @if ($payments->count() > 0)
                    <div class="card-body">

                        @foreach ($payments as $payment)
                            <div class="row book_data">
                                <div class="col-md-2 my-auto">
                                    <!-- <img src="{{ URL::to('/' . $payment->books->image) }}" class="col-md-2 my-auto"> -->
                                    <img src="{{ asset('/' . $payment->books->image) }}" height="70px" width="70px">

                                </div>
                                <div class="col-md-3">
                                    <h6>{{ $payment->books->name }}</h6>
                                    <input type="hidden" class="book_id" value="{{ $payment->boo_id }}">
                                </div>
                                <div class="col-md-3">
                                    <h6>{{ $payment->books->desc }}</h6>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{ route('fav.destroy', $payment->id) }}">
                                        <!-- @method('DELETE') -->
                                        @csrf
                                        <button class="btn btn-danger"><i class="fa fa-trash"> </i>Remove</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @else
                    <h4>there is no books in your payments </h4>
                @endif

            </div>
        </div>
    </div>



@endsection
