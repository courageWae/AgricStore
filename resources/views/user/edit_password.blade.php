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

        <section class="products-section shop section-padding">
            <div class="container">
                <div class="row products-grids">
                    <!-- PACKAGE ONE -->
                    @include('layouts.user.dashBox')
                    <div class="col col-lg-8" style ="padding-left:20px;">
                      @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-success'}}">
                          {{ session('message') }}
                        </div>
                      @endif   
                      <h2>Change Password</h2><hr>
                      <form method='post' action="{{ route('user.password.update',['client'=>Auth::user()->id]) }}">
                        @csrf
                        @method('PATCH')
                        <h4>Old Password</h4>
                        <div class="well well-sm">
                          <div class="form-group">
                              <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" required>
                              @error('old_password')
                                <span class="invalid-feedback" role="alert" style="color:red;">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        </div>
                        <h4>New Password</h4>
                        <div class="well well-sm">
                          <div class="form-group">
                              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                              @error('password')
                                <span class="invalid-feedback" role="alert" style="color:red;">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        </div>
                        <h4>Confirm New Password</h4>
                        <div class="well well-sm">
                          <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" required>
                          </div>
                        </div>
                        <div style="display:inline-block;"> 
                          <button class="btn btn-primary btn-lg" type="submit">{{ __('Change password') }}</button>
                        </div>
                        <a class="btn btn-link" href="{{ route('password.request') }}">Forget Password ?</a>
                      </form>
                      
                    </div>
               </div> <!-- end row -->
            </div> <!-- end container -->
        </section>      

@endsection