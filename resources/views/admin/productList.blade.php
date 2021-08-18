<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    @include('layouts.admin.header')
    <!--header end-->

    <!--sidebar start-->
    @include('layouts.admin.sidebar')

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">

          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i>Projects</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('index') }}">Home</a></li>
              <li><i class="fa fa-table"></i>Table</li>
              <li><i class="fa fa-th-list"></i>List of Projects</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
             @if(session()->has('message'))
             <div class="alert {{session('alert') ?? 'alert-success'}}">
              {{ session('message') }}
             </div>
             @endif
            <section class="panel">
              <header class="panel-heading">
                List of Projects
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th><i class="icon_profile"></i> Product Name</th>
                    <th><i class="icon_profile"></i> Photo</th>
                    <th><i class="icon_profile"></i> Price</th>
                    <th><i class="icon_currency_alt"></i> Discount</th>
                    <th><i class="icon_check"></i> Number of clicks</th>
                    <th><i class="icon_calendar"></i> Product Category</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  @foreach($product as $products)
                  <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $products->product_name }}</td>
                    <td>
                      <a href="{{ asset('storage/'.$products->photo) }}" target="blank">
                        <img src="{{ asset('storage/'.$products->photo) }}" style="width:50px; height:50px;" alt></td>
                      </a>
                    <td>{{ $products->price }}</td>
                    <td> &cent {{ $products->discount }}</td>
                    <td> {{ $products->clicks }}</td>
                    <td> {{ $products->category->name }}</td>
                    <td>
                      <a href="{{ route('admin.edit.product', ['product' => $products->id ]) }}" class="btn btn-success">Edit</a>
                      <a href="{{ route('admin.delete.project',['product' => $products->id]) }}" class="btn btn-danger delete-confirm">Delete</a> 
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
        text: 'This Project will be permanently deleted',
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
