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
  <link href="{{ asset('admin/css/daterangepicker.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

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
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Lawyer</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('legal.home') }}">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-file-text-o"></i>New Lawyer</li>
            </ol>
          </div>
        </div>
        
        <!-- Basic Forms & Horizontal Forms-->

        <div class="row">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-6">
             @if(session()->has('message'))
                <div class="alert {{session('alert') ?? 'alert-success'}}">
                  {{ session('message') }}
                </div>
              @endif
            <section class="panel">
              <header class="panel-heading">
                New Lawyer
              </header>
              <div class="panel-body">
                <div class="form">
                  <!-- Administrator Forms -->
                  <form class="form-validate form-horizontal" method="post" action="{{ route('lawyer.add') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="role_id" value="3">
                    <div class="form-group ">
                      <label for="name" class="control-label col-lg-2">Full name <span class="required">*</span></label>
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
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required/>
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="phone" class="control-label col-lg-2">Phone <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input name="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" required />
                          @error('phone')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">Address<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input name="address" type="address" class="form-control @error('address') is-invalid @enderror" required />
                          @error('address')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="house_address" class="control-label col-lg-2">House Address<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input name="house_address" type="address" class="form-control @error('house_address') is-invalid @enderror" required />
                          @error('house_address')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="type_of_lawyer" class="control-label col-lg-2">Type of Lawyer<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select name="type_of_lawyer" class="form-control" required>
                          <option selected="selected" disabled="disabled">--  CHOOSE A TYPE OF LAWYER</option>
                          @php($types = \App\TypeOfAttorney::all())
                          @foreach($types as $types)
                          <option>{{ $types->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="personal_statement" class="control-label col-lg-2">Per. Statement<span class="required"></span></label>
                      <div class="col-lg-10">
                        <textarea rows = "10" placeholder="My personals tatement" name="personal_statement" class="form-control @error('personal_statement') is-invalid @enderror" required></textarea>
                          @error('personal_statement')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="education" class="control-label col-lg-2">Education History<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea rows = "10" placeholder="Education History" name="education" class="form-control @error('education') is-invalid @enderror" required></textarea>
                          @error('education')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="experience" class="control-label col-lg-2">Experience <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea rows = "5" placeholder="Your Experience" name="experience" class="form-control @error('experience') is-invalid @enderror" required></textarea>
                          @error('experience')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" requiredrequired />
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="confirm_password" name="password_confirmation" type="password" required/>
                      </div>
                    </div>
                    
                     <div class="form-group ">
                      <label for="photo" class="control-label col-lg-2">Upload Photo <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input name="photo" type="file" class="form-control @error('photo') is-invalid @enderror" required />
                         @error('photo')
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
        <!-- Inline form-->

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

  <!-- jquery ui -->
  <script src="{{ asset('admin/js/jquery-ui-1.9.2.custom.min.js') }}"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="{{ asset('admin/js/ga.js') }}"></script>
  <!--custom switch-->
  <script src="{{ asset('admin/js/bootstrap-switch.js') }}"></script>
  <!--custom tagsinput-->
  <script src="{{ asset('admin/js/jquery.tagsinput.js') }}"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="{{ asset('admin/js/jquery.hotkeys.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap-wysiwyg.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap-wysiwyg-custom.js') }}"></script>
  <script src="{{ asset('admin/js/moment.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap-colorpicker.js') }}"></script>
  <script src="{{ asset('admin/js/daterangepicker.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap-datepicker.js') }}"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="{{ asset('admin/assets/ckeditor/ckeditor.js') }}"></script>
  <!-- custom form component script for this page-->
  <script src="{{ asset('admin/js/form-component.js') }}"></script>
  <!-- custome script for all page -->
  <script src="{{ asset('admin/js/scripts.js') }}"></script>


</body>

</html>
