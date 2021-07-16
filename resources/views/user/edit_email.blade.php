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
                            <li><a href="{{ route('legal.home') }}">Home</a></li>
                            <li>Edit Email</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->

        <section class="products-section shop section-padding">
            <div class="container">
                <div class="row products-grids">
                    <!-- PACKAGE ONE -->
                    @include('user.dashBox')
                    <div class="col col-lg-8" style ="padding-left:20px;">
                      @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-success'}}">
                          {{ session('message') }}
                        </div>
                      @endif   
                      <h2>Change Email</h2><hr>
                      <form method='post' action="{{ route('user.email.update',['alias'=>Auth::user()->alias]) }}">
                        @csrf
                        @method('PATCH')
                        <h4>Email Address</h4>
                        <div class="well well-sm">
                          <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                              <span class="invalid-feedback" role="alert" style="color:red;">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <div> 
                          <button class="btn btn-primary btn-lg" type="submit">{{ __('Change Email') }}</button>
                        </div>
                      </form>
                      
                    </div>
               </div> <!-- end row -->
            </div> <!-- end container -->
        </section>      

@endsection