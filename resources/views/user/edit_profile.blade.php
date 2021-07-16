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
                     @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-success'}}">
                          {{ session('message') }}
                        </div>
                    @endif
                        <table class="table table-striped table-bordered">
                           <thead>
                               <tr style="background-color:rgb(245, 197, 66);">
                                   <th colspan="4">My Profile</th>
                               </tr>
                            </thead>
                            <tbody>
                               <tr>
                                   <td colspan="4" style="padding:15px;">
                                     <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="post" action="{{ route('user.profile.update',['alias'=>Auth::user()->alias]) }}" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                   @method('PATCH')
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" value="{{ Auth::user()->name }}" name ="name" class="form-control @error('name') is-invalid @enderror" required>
                                            @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">User Name</label>
                                        <div class="col-md-12">
                                          <input type="text" value="{{ Auth::user()->user_name }}" name ="user_name" class="form-control @error('user_name') is-invalid @enderror" required>
                                          @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email Address</label>
                                        <div class="col-md-12">
                                            <input type="email" value = "{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror" name="email" readonly>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-12">Phone Number</label>
                                        <div class="col-md-12">
                                            <input type="text" value = "{{ Auth::user()->phone }}" name="phone"class="form-control @error('phone') is-invalid @enderror" required>
                                            @error('phone')
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Photo</label>
                                        <div class="col-md-12">
                                          <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                          @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">
                                               <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-bar-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                               <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                                               </svg>&nbsp&nbspUpdate Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                                    </td>
                                   </tr>


                           </tbody>
                        </table>
                    </div>
               </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end products-section -->

@endsection
