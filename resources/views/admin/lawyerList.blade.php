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

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    @include('layouts/admin/header')
    <!--header end-->

    <!--sidebar start-->
    @include('layouts/admin/sidebar')

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-table"></i>Table</li>
              <li><i class="fa fa-th-list"></i>Basic Table</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                List of Registered Lawyers
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th><i class="icon_profile"></i> Full Name</th>
                    <th><i class="icon_profile"></i> Photo</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th><i class="icon_mobile"></i> Mobile</th>
                    <th><i class="icon_pin_alt"></i>Address</th>
                    <th><i class="icon_house"></i> House No:</th>
                    <th>Type</th>
                    <th> <i class="icon_house"></i> Education</th>
                    <th>Eperience</th>
                    <th>Personal Statement</th>
                    <th>Date</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>

                  @foreach($lawyer as $lawyer)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lawyer->name }}</td>
                    <td><img src ="{{ asset('/uploads/pictures/user/'.$lawyer->photo) }}" style="width:30px; height: 30px;"></td>
                    <td>{{ $lawyer->email }}</td>
                    <td>{{ $lawyer->phone }}</td>
                    <td>{{ $lawyer->address }}</td>
                    <td>{{ $lawyer->house_address }}</td>
                    <td>{{ $lawyer->type_of_lawyer }}</td>
                    <td>{{ $lawyer->education }}</td>
                    <td>{{ $lawyer->experience }}</td>
                    <td>{{ $lawyer->personal_statement }}</td>
                    <td>{{ $lawyer->created_at }}</td>
                    <td>
                      <a href="{{ route('lawyer.view',['lawyer'=>$lawyer->id]) }}" class="btn btn-primary">View</a>
                    </td>
                    <td>
                      <a href="/lawyer/{{$lawyer->id}}" class="btn btn-danger delete-confirm">Delete</a>
                    </td>
                    
                  </tr> 
                  @endforeach

                </tbody>
              </table>
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
        text: 'This Lawyer will be permanently deleted',
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
