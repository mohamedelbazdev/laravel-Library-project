@extends('site.layouts.site')

@section('pageContent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
                            <a class="dropdown-item" href="{{'/site/books'}}">Latest</a>
                            <a class="dropdown-item" href="#">Rate</a>
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        @foreach($books as $book)
        <div class="card m-4 book_data " style="width: 18rem;  ">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <!-- <img class="img-fluid w-100" src="{{asset ('assets/img/product-1.jpg')}}" alt=""> -->
                    <div class="product-action">
                       
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                        <!-- <a class="btn btn-outline-dark btn-square addToFav " ><i class="far fa-heart"></i></a> -->
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div  class="card book_data" >
                <img src="{{URL::to('/'.$book['image'])}}" style="width:100% ">
                </div>
               
                <div class="text-center py-4">
                <input type="hidden" value="{{$book->id}}" class="book_id">
                    <a class="h6 text-decoration-none text-truncate" href="">{{$book['name']}}</a>
                   
                    <div class="d-flex align-items-center justify-content-center mt-2">
                    <p class="inner__des">{{ $book['desc'] }}</p>
                    </div>
                    <button class="btn btn-primary-dark me-3 addToFav " id="addFav" >Favourits<i class="far fa-heart"></i></button>
                    
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
      
    
       
    </div>
     
    <script>
                    $(document).ready(function(){
                        $('.addToFav').click(function(e){
                            e.preventDefault();
                            var book_id = $(this).closest('.book_data').find('.book_id').val();
                       
                            $.ajax({
                                method: "POST",
                                url: "/site/add-to-favourite",
                                data:{
                                    'book_id':book_id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                success:function(response){
                                 alert(response.status);
                                }
                            })
                        })
                    })
                    </script>
        <div class="col-12">
            <nav>
                
                <ul class="pagination justify-content-center">
                <!-- {{ $books->links() }} -->
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

@section('script')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script>
    
    $('.addToFav').click(function(e){
        e.preventDefault();
        var book_id = $(this).closest('.book_data').find('.book_id').val();
       
        $.ajax({
            method: "POST",
            url: "/add-to-favourite",
            data:{
                'book_id':book_id,

            },
            sucess:function(response){
                swal(response.status);
            }
        })
   });
</script> -->

@endsection
