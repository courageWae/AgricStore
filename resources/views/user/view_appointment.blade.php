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
                    @php($lawyer = App\User::find($booking->lawyer_id))
                    <div class="col col-lg-8" style ="padding-left:20px;"> 
                       <h2>Appointment Details</h2><hr> 
                       <h4>Name of Lawyer</h4>
                       <div class = "well well-sm">{{ $lawyer->name }}</div>
                       <h4>Type of Lawyer</h4>
                       <div class = "well well-sm">{{ $lawyer->type_of_lawyer }}</div>
                       <h4>Call Credits</h4>
                       <div class = "well well-sm">{{ $booking->credits }}</div>
                       <h4>Date of Booking</h4>
                       <div class = "well well-sm">{{ $booking->date }}</div>
                       <h4>Booking Time</h4>
                       <div class = "well well-sm">{{ $booking->timeslot }}</div>
                       <h4>Status</h4>
                       <div class = "well well-sm">{{ $booking->status }}</div>

                    </div>
               </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end products-section --> 
@endsection