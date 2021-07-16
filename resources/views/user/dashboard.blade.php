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
                    <!-- PACKAGE ONE -->
                    @include('layouts.user.dashBox')
                    @isset($professions)
                    <h2>Based on the answers to the question you provided, the following  career were predictored</h2><hr>
                    @foreach($professions as $profession)
                    <div class="col col-lg-8" style ="padding-left:20px;">
                        <center> {{ $loop->iteration }} </center>
                        <h4>Career Title</h4>
                        <div class="well well-sm">{{ $profession->title }}</div>
                        <h3>Definition</h3>
                        <div class = "well well-sm">{{ $profession->definition }}</div>
                        <h3>Requirement</h3>
                        <div class = "well well-sm">{{ $profession->requirement }}</div>
                        <h3>Average Salary (Annually)</h3>
                        <div class = "well well-sm">{{ $profession->salary }}</div>
                        <hr style= "background-color : black; height : 3px">
                    </div>

                    @endforeach
                    @endisset

               </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end products-section -->
@endsection
