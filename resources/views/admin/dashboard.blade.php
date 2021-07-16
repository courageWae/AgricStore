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
              <li><i class="fa fa-home"></i><a href="">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>
        @inject('user','App\User')
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-users"></i>
              <div class="count">{{ $user->client()->count() }}</div>
              <div class="title">Users</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-user"></i>
              <div class="count">{{ $user->Lawyer()->count() }}</div>
              <div class="title">Lawyers</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-cubes"></i>
              <div class="count">{{ $user->Insurer()->count() }}</div>
              <div class="title">Insurers</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-user"></i>
              <div class="count">{{ $user->Admin()->count() }}</div>
              <div class="title">Number of Administrators</div>
            </div>
            <!--/.info-box-->
          </div>

        </div>
        <!--/.row-->


        <!-- Today status end -->
        <div class="row">

          <div class="col-lg-9 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Packages </strong></h2>
              </div>
              <div class="panel-body">
                @isset($package)
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th>Package Name</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Clients Name</th>
                      <th>Clients Email</th>
                      <th>Clients Photo</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Approved On</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($package as $package)

                     @php($isClient = \App\User::find($package->user_id))
                     @php($isClientCategory = \App\Category::find($package->category_id))
                    <tr>
                      <td>{{ $isClientCategory->Package->name }}</td>
                      <td>{{ $isClientCategory->name }}</td>
                      <td>{{ $isClientCategory->price }}</td>
                      <td>{{ $isClient->name }}</td>
                      <td>{{ $isClient->email }}</td>
                      <td>
                        <a href="{{ asset('uploads/pictures/user/'.$isClient->photo ) }}" target = "blank">
                          <img src="{{ asset('uploads/pictures/user/'.$isClient->photo ) }}" style="height:30px; margin-top:-2px;">
                        </a>
                      </td> 
                      @if($package->status == "Inactive")     
                      <td><p style="color:red;">{{ $package->status }}</p> </td>
                      @else
                      <td><p style="color:green;">{{ $package->status }}</p> </td>
                      @endif
                      <td>{{ $package->created_at }}</td>
                      <td>
                      @if($package->status != "Inactive")   
                        {{$package->updated_at}}
                      @endif
                      </td>
                    </tr>
                    @endforeach      
                  </tbody>
                </table>
                @endisset
              </div>

            </div>

          </div>
          <!--/col-->
          <div class="col-md-3">
            @inject('countPackage','App\ClientPackage')
            <div class="social-box facebook">
              <i class="fa fa-shopping-cart"></i>
              <ul>
                <li>
                  <strong>{{ $countPackage->Active()->count() }}</strong>
                  <span>Active Packages</span>
                </li>
                <li>
                  <strong>{{ $countPackage->InActive()->count() }}</strong>
                  <span>Inactive Packages</span>
                </li>
              </ul>
            </div>
            <!--/social-box-->
          </div>
          
          <!--/col-->
          <!-- <div class="col-md-3">

            <div class="social-box twitter">
              <i class="fa fa-twitter"></i>
              <ul>
                <li>
                </li>
                <li>
                  <strong>0</strong>
                  <span>tweets</span>
                </li>
              </ul>
            </div> 
            

          </div>-->
          <!--/col-->

        </div>



        <!-- statics end -->




        <!-- project team & activity start -->
        <div class="row">

          <!-- Messages -->
          <div class="col-lg-6 portlets">
            <!-- Widget -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left"> Messages From Visitors</div>
                <div class="clearfix"></div>
              </div>

              <div class="panel-body"style="background-color: green;">
                <!-- Widget content -->
                <div class="padd sscroll">
                  <ul class="chats">
                    @forelse($msg as $msg)
                    <li class="by-other" >
                      <!-- Use the class "pull-right" in avatar -->
                      <div class="avatar pull-right">
                        <img src="{{asset('assets/images/holder.png')}}" alt="" style="height: 40px; width:40px"/>
                      </div>

                      <div class="chat-content">
                        <!-- In the chat meta, first include "time" then "name" -->
                        <div class="chat-meta">{{ $msg->created_at }}<span class="pull-right">{{ $msg->name }}</span></div>
                        <strong>{{ $msg->message }}</strong>
                        <div class="clearfix"></div>
                      </div>
                    </li>
                    @empty
                    <li class="by-me">
                      <div class="chat-content">
                        <strong>There are no messages to display</strong>
                      </div>
                    </li>
                   @endforelse

                  </ul>

                </div>
              </div>


            </div>
          </div>
          <!-- Messages to -->

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
</body>

</html>
