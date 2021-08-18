@extends('layouts.user.master')
@section('head')
   @include('layouts.user.head')
@endsection
@section('content')
        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>DashBoard</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li>Dashboard</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

         <!-- start products-section -->
        <section class="products-section shop section-padding">
            <div class="container">
                <div class="row products-grids">
                    <!-- CLIENT ORDERS -->
                    @include('layouts.user.dashBox')
                    <div class="col col-lg-9" style ="padding-left:20px;">
                        <h4>My Orders</h4>
                        <hr>
                        @isset($product)
                        @forelse($product as $product)
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/'.$product->photo) }}" alt="photo of product"  style = "width:200px;height:220px;">
                                </div>
                                <div class="col-md-8">
                                    <form method="POST" action="{{ route('user.checkout',['user_product' => $product->id]) }}">
                                    @csrf
                                      <div class="card-body">
                                        <h5 class="card-title">{{ strtoupper($product->product_name) }}</h5>
                                        <p class="card-text">This Product is available for shipping </p>
                                        <h4 style = "color:black">Item Price :  &cent {{ $product->price }}</h4>
                                        <h4 style = "color:black">Item Discount : {{ $product->discount }}% on each product</h4>

                                        <p class="card-text" style = "color:black">
                                        Item Quantity &nbsp&nbsp&nbsp&nbsp
                                        <select name="quantity">
                                            <option selected>1</option>
                                            @for($i=2; $i<=10; $i++)
                                            <option>{{ $i }}</option>
                                            @endfor
                                        </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="{{ route('user.product.delete',['user_product' => $product->id]) }}" class="delete-confirm"><i class="fa fa-trash-o fa-lg"></i></a>       
                                        </p>
                                        <p class="card-text"><small class="text-muted" style="color:black">Added to cart on <b>{{ $product->created_at->toFormattedDateString() }}</b></small>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <button class="btn btn-success" type = "submit">Proceed to Checkout </button></p>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr style= "background-color:#f56942; height:2px ; width:150px">

                        @empty
                        <h4>You have no Order Available</h4>
                        @endforelse
                        @endisset
                    </div>
               </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end products-section -->

@endsection
