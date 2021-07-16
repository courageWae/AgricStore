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
  <link href="{{ asset('admin/css/daterangepicker.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet" />
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
            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Create Project</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('legal.home') }}">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-file-text-o"></i>New Projects</li>
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
                New Project
              </header>
              <div class="panel-body">
                <div class="form">

                  <!-- Administrator Forms -->
                  <form class="form-validate form-horizontal" method="post" action="{{ route('project.create') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group ">
                      <label for="name" class="control-label col-lg-2"><strong>Project Name</strong></label>
                      <div class="col-lg-10">
                        <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" required/>
                          @error('name')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>
                    
                   <div class="form-group">
                      <label for="name" class="control-label col-lg-2"><strong>Content</strong></label>
                      <div class="col-lg-10">
                        <textarea class="form-control @error('content') is-invalid @enderror" id="summary-ckeditor" name="content">
                        </textarea>
                      </div>
                      @error('content')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>


                    <div class="form-group ">
                      <label for="phone" class="control-label col-lg-2"><strong>Status</strong></label>
                      <div class="col-lg-10">
                        <select class="form-control" name="status" type="text" required>
                          <option disabled selected>Status of Project</option>
                          <option>Completed</option>
                          <option>Ongoing</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="photo" class="control-label col-lg-2"><strong>Date of Project</strong></label>
                      <div class="col-lg-10">
                        <input class="form-control @error('date') is-invalid @enderror" name="date" type="date" required/>
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="photo" class="control-label col-lg-2"><strong>Upload Photo</strong></label>
                      <div class="col-lg-10">
                        <input class="form-control @error('photo') is-invalid @enderror" name="photo" type="file" required/>
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
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace( 'summary-ckeditor' );
  </script>

</body>

</html>
