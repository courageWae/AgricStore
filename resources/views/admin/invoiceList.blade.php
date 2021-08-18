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
    @include('layouts.admin.header')
    <!--header end-->

    <!--sidebar start-->
    @include('layouts.admin.sidebar')

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">

            @if(session()->has('message'))
              <div class="alert {{session('alert') ?? 'alert-success'}}">
               {{ session('message') }}
              </div>
            @endif
            <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('index') }}">Home</a></li>
              <li><i class="fa fa-table"></i>Table</li>
              <li><i class="fa fa-th-list"></i>List of Invoices</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                List of Invoices
              </header>
               @inject('user','App\Models\User')
               @inject('user_product','App\Models\UserProduct')
               @inject('category', 'App\Models\Category')
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Name of Client</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Photo of Client</th>
                    <th>Package Name</th>
                    <th>Category</th>
                    <th>Total Price</th>
                    <th>Payment Status</th>
                    <th>Created At</th>
                    <th>Paid On</th>
                    <th>Action</th>
                  </tr>
                  @foreach($invoices as $invoice)
                    @php
                      $client = $user->find($invoice->user_id);
                      $userProduct = $user_product->find($invoice->user_product_id);
                      $cat = $category->where("id", $userProduct->category_id)->value("name");
                    @endphp  
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td><img src="{{ asset('storage/'.$user->photo ) }}" style="height:30px; margin-top:-2px;">
                    </td>
                    <td>{{ $userProduct->product_name }}</td>
                    <td style = "color:black">{{ strtoupper($cat) }}</td>
                    <td>{{ $userProduct->total_price }}</td>
                    <td>
                      @if($invoice->status == 'pending')
                        <span style="color:red; font-weight:bold;">{{ $invoice->status }}</span>
                      @else
                        <span style="color:green; font-weight:bold;">{{ $invoice->status }}</span>
                      @endif
                      </td>
                    <td>{{ $invoice->created_at->toFormattedDateString() }}</td>
                    @if($invoice->status !== 'pending')
                    <td>{{ $invoice->updated_at->toFormattedDateString() }}</td>
                    @else
                    <td> -----</td>
                    @endif
                    <td>
                      <a href="{{ route('admin.view.invoices',['invoice' => $invoice->id]) }}" class="btn btn-primary">View</a>
                      <a href="{{ route('admin.delete.invoices',['invoice' => $invoice->id]) }}" class="btn btn-danger delete-confirm">Delete</a>   
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
        text: 'This Invoice will be permanently deleted',
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
