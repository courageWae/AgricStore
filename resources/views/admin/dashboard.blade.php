<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>{{ config('app.name','Agric Store') }}</title>

  <!-- Bootstrap CSS -->
  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ asset('admin/css/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('admin/css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="{{ asset('admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="{{ asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="{{ asset('admin/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="{{ asset('admin/css/widgets.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/css/xcharts.min.css') }}" rel=" stylesheet">
  <link href="{{ asset('admin/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">

    <!-- Header -->
    @include('layouts.admin.header')
    <!-- End Header -->

    <!--sidebar start-->
    @include('layouts.admin.sidebar')
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('index') }}">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <!-- Dependency Injections -->
        @inject('user','App\Models\User')
        @inject('product', 'App\Models\Product')
        @inject('messages', 'App\Models\Contact')

        <!-- End -->
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-users"></i>
              <div class="count">{{ $user->Client()->count() }}</div>
              <div class="title">clients</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-user"></i>
              <div class="count">{{ $user->Admin()->count() }}</div>
              <div class="title">Administrators</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <div style="display:inline-block">
                  <div class="info-box green-bg">
                    <i class="fa fa-user"></i>
                    <div class="count">{{ $product->Equipment()->count() }}</div>
                    <div class="title">Number of Equipments</div>
                  </div>
                </div>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <div style="display:inline-block">
                  <div class="info-box green-bg">
                    <i class="fa fa-user"></i>
                    <div class="count">{{ $product->FoodStuff()->count() }}</div>
                    <div class="title">Number of Food-Stuffs</div>
                  </div>
                </div>
               &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <div style="display:inline-block">
                  <div class="info-box green-bg">
                    <i class="fa fa-user"></i>
                    <div class="count">{{ $product->Fertilizer()->count() }}</div>
                    <div class="title">Number of Fertilizers</div>
                  </div>
                </div>
        
                <p>Total Number of Products : {{ $product->count() }}</p>
                
            </div>
          </div>
        </div>
        <!--/.row-->
        <div class="row">

          <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
          <h4><b>Messages</b></h4>
          <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th><i class="icon_profile"></i> Full Name</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th><i class="icon_mail_alt"></i> Message</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  
                  @forelse($messages->get() as $message)
                  <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->message }}</td>
                    <td>
                      <a href="{{ route('admin.message.delete',['message' => $message->id]) }}" class="btn btn-danger delete-confirm">Delete</a>   
                    </td>
                  </tr>
                  @empty
                  <p style="color:black;">No message to display</p>
                  @endforelse

                        
                </tbody>
              </table>

          </div>

        </div>


       

      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="../admin/js/jquery.js"></script>
  <script src="../admin/js/jquery-ui-1.10.4.min.js"></script>
  <script src="../admin/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="../admin/js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="../admin/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="../admin/js/jquery.scrollTo.min.js"></script>
  <script src="../admin/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="../admin/assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="../admin/js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="../admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="../admin/js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="../admin/js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="../admin/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="../admin/js/calendar-custom.js"></script>
    <script src="../admin/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="../admin/js/jquery.customSelect.min.js"></script>
    <script src="../admin/assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="../admin/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="../admin/js/sparkline-chart.js"></script>
    <script src="../admin/js/easy-pie-chart.js"></script>
    <script src="../admin/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../admin/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../admin/js/xcharts.min.js"></script>
    <script src="../admin/js/jquery.autosize.min.js"></script>
    <script src="../admin/js/jquery.placeholder.min.js"></script>
    <script src="../admin/js/gdp-data.js"></script>
    <script src="../admin/js/morris.min.js"></script>
    <script src="../admin/js/sparklines.js"></script>
    <script src="../admin/js/charts.js"></script>
    <script src="../admin/js/jquery.slimscroll.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>


<script>
  $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This Administrator will be permanently deleted',
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
