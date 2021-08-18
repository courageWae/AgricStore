<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>{{ config('app.name','Lexicon Support Service') }}</title>

  <!-- Bootstrap CSS -->
  <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../admin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../admin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../admin/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="../admin/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    @include('layouts.admin.header')
    <!--header end-->

    <!--sidebar start-->
    @include('layouts.admin.sidebar')
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('index') }}">Home</a></li>
              <li><i class="icon_documents_alt"></i>Pages</li>
              <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4>{{ Auth::user()->name }}</h4>
                  <div class="follow-ava">
                    <img src="{{ asset('storage/'.Auth::user()->photo ) }}" alt>
                  </div>
                  <h6>Administrator</h6>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <p>Hello I’m {{ Auth::user()->name }}, An Adminstrator from THE AGRIC STORE</p>
                  <p>{{ Auth::user()->email }}</p>
                  <!-- <p><i class="fa fa-twitter">jenifertweet</i></p> -->
                  <h6>
                    <span><i class="icon_clock_alt"></i>{{ now()->toFormattedDateString() }}</span>
                    <span><i class="icon_calendar"></i>{{ now()->toTimeString() }}</span>
                    <span><i class="icon_pin_alt"></i>Accra Ghana</span>
                  </h6>
                </div>
                <!-- <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-comments fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
                    </li>

                  </ul>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-bell fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
                    </li>

                  </ul>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-tachometer fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
                    </li>

                  </ul>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li>
                    <a data-toggle="tab" href="#profile">
                      <i class="icon-user"></i>
                        Profile
                    </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                      <i class="icon-envelope"></i>
                        Edit Profile
                    </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <!-- profile -->
                  <div id="profile" class="tab-pane active">
                    <section class="panel">
                      <div class="bio-graph-heading">
                        <h2>Your Profile Details</h2>
                      </div>
                      <div class="panel-body bio-graph-info">
                        <h1><strong>My Profile</strong></h1>
                        <div class="row">        
                          <div class="bio-row">
                            <p><span>Full Name </span>:  <b> {{ Auth::user()->name }} </b></p>
                          </div>
                          <div class="bio-row">
                            <p><span>User Name </span>:  <b> {{ Auth::user()->user_name }} </b></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Role </span>: Administrator</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span>: <b>{{ Auth::user()->email }}</b></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Mobile </span>: <b> {{ Auth::user()->phone }} </b></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Country </span>: Ghana</p>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>

                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-success'}}">
                         {{ session('message') }}
                        </div>
                      @endif
                      <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>

                        <!-- FORM STARTS -->
                        <form class="form-horizontal" method="post" action="{{ route('admin.profile.update', ['admin' => Auth::user()->id]) }}" enctype= "multipart/form-data">
                           @csrf
                           @method('PATCH')
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Full Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">User Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" name="user_name" value="{{ Auth::user()->user_name }}" required>
                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                               @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Phone</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" required>
                               @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="password"  required>
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Confirm Password</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Photo</label>
                            <div class="col-lg-6">
                              <input type="file" class="form-control" name="photo">
                              @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-success">Save</button>
                            </div>
                          </div>

                        </form>
                        <!-- END OF FORM -->
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="{{ asset('admin/js/jquery.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
  <!-- nice scroll -->
  <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="{{ asset('admin/assets/jquery-knob/js/jquery.knob.js') }}"></script>
  <!--custome script for all page-->
  <script src="{{ asset('admin/js/scripts.js') }}"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>


</body>

</html>
