@extends('site.layouts.site')

@section('pageContent')
    <!-- Shop Product Start -->
    <div class="col">
        <div class="row pb-3">
            <div class="col-12 pb-1">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                        <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                    </div>
                    <div class="ml-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                data-toggle="dropdown">Sorting</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ '/site/books' }}">Latest</a>
                                <a class="dropdown-item" href="#">Rate</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <h1 class="section-title position-relative text-uppercase mx-xl-5 mb-4"> {{ $category->Catname }}</h1>
            @foreach ($books as $book)
                <div class="card m-4" style="width: 18rem; ">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                            <div class="product-action">

                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="card">
                            <img src="{{ URL::to('/' . $book['image']) }}" style="width:100% ">
                        </div>
                        <div class="text-center py-4">

                            <a class="h6 text-decoration-none text-truncate"
                                href="{{ route('book', $book->id) }}">{{ $book['name'] }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <p class="inner__des">{{ $book['desc'] }}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">

                                <small onclick="saveRate('{{ $book->id }}', '1')" class="fa fa-star text-primary mr-1"></small>
                                <small onclick="saveRate('{{ $book->id }}', '2')" class="fa fa-star text-primary mr-1"></small>
                                <small onclick="saveRate('{{ $book->id }}', '3')" class="fa fa-star text-primary mr-1"></small>
                                <small onclick="saveRate('{{ $book->id }}', '4')" class="fa fa-star text-primary mr-1"></small>
                                <small onclick="saveRate('{{ $book->id }}', '5')" class="fa fa-star text-primary mr-1"></small>
<!--                                <small>(99)</small>-->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-12">
            <nav>
                <ul class="pagination justify-content-center">
                    {{-- <!-- {{ $books->links() }} --> --}}
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                    <li class="page-item active"><a class="page-link" href=" #">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>

                </ul>
            </nav>
        </div>
    </div>
    <!-- Shop Product End -->
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    function saveRate(bookId, rate){
        alert(rate)
        $.ajax({
            type:"POST",
            dataType:"json",
            url: "/api/user/rate/store",
            data: {'book_id': bookId, 'rate': rate, 'user_id' : "<?php echo Illuminate\Support\Facades\Auth::id() ?>"},
            success: function(data){
                console.log(data.success);
            }
        });
    }
</script>
ِ
