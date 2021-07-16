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
  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ asset('admin/css/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('admin/css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    @include('layouts.admin.header')
    <!--header end-->

    <!--sidebar start-->
    @include('layouts.admin.sidebar')

  <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i>Add Lawyer Type</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('legal.home') }}">Home</a></li>
              <li><i class="fa fa-table"></i>Table</li>
              <li><i class="fa fa-th-list"></i>Add Lawyer Types</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3"></div>

          <div class="col-lg-6">
            @if(session()->has('message'))
              <div class="alert {{session('alert') ?? 'alert-success'}}">
               {{ session('message') }}
              </div>
            @endif
            <section class="panel">
              <header class="panel-heading">
                List
              </header>
              <div class="panel-body">
                <!-- Tables -->
                <table class="table table-condensed">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Type of Lawyer</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>  
                @isset($type) 
                  @foreach($type as $type)  
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->description }}</td>
                    <td>{{ $type->created_at->toDateString() }}</td>
                    <td>
                      <a href="{{ route('typeOfLawyer.delete',['typeOfLawyer'=>$type->id]) }}" class="btn btn-danger delete-confirm">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                @endisset       
                </tbody>
              </table>
                
              </div>
            </section>   
          </div>
          <div class="col-lg-3"></div>
        </div>

        <div class="row">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Lawyer Type
              </header>
              <div class="panel-body">
                <div class="form">

                  <!-- Administrator Forms -->
                  <form class="form-validate form-horizontal" method="post" action="{{ route('type.lawyer.add') }}">
                    {{ csrf_field() }}
                    <div class="form-group ">
                      <label for="type" class="control-label col-lg-2">Type Of Lawyer <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" required/>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="description" class="control-label col-lg-2">Description <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" required></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Add</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </section>
          </div>
          <div class="col-lg-3">
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
  <!-- nicescroll -->
  <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="{{ asset('admin/js/scripts.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This item will be permanently deleted',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>


</body>

</html>
