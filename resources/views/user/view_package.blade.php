@extends('layouts.web.master')
@section('head')
   @include('layouts.web.head')
@endsection
@section('content')
        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>DashBoard</h2>
                        <ol class="breadcrumb">
                            <li><a href="index-2.html">Home</a></li>
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
                    <!-- PACKAGE ONE -->
                    @include('user.dashBox')
                    <div class="col col-lg-8" style ="padding-left:20px;">
                      <h2>Package Details</h2><hr>  
                      <h4>Package Name</h4>
                      <div class="well well-sm">{{ $category_alias->package->name }}</div>
                      <h4>Category Name</h4>
                      <div class = "well well-sm">{{ $category_alias->name }}</div>
                      <h4>Category Price</h4>
                      <div class = "well well-sm">GH&cent  {{ $category_alias->price }}</div>
                      <div>
                        <a class="btn btn-primary btn-lg" href="{{ route('admin.dashboard') }}">Back</a>
                      </div>
                    </div>
               </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end products-section --> 
@endsection