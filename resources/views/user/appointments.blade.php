@extends('layouts.web.master')
@section('head')
   @include('layouts.web.head')
@endsection
@section('content')
        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>DashBoard</h2>
                        <ol class="breadcrumb">
                            <li><a href="">Home</a></li>
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
                    @include('user.dashBox')
                    <div class="col col-lg-9" style ="padding-left:20px;">
                        <table class="table table-striped table-bordered">
                           <thead>
                               <tr style="background-color:rgb(245, 197, 66);">
                                   <th colspan="10">Survey Answer Summary</th>
                               </tr>
                            </thead>
                            <tbody>
                               
                                @forelse($step_1 as $step)
                                <tr>
                                  <th><span style = "color:red">QUESTION</span></th>
                                  <th><span style = "color:red">ANSWERS</span></th>
                                </tr>
                                <tr>
                                  <th colspan="10" style="padding:15px;"><span class="label label-primary" style="padding:5px; font-size:20px;">STEP 1</span></th>
                               </tr>
                               
                                <tr>
                                    <th>Advise organizations on how to meet their business goals</th>
                                    <td>{{  $step->q1 }}</td>
                                </tr>
                                <tr>
                                    <th>Teach how to use the computer effectively</th>
                                    <td>{{ $step->q2 }}</td>
                                </tr>
                                <tr>
                                    <th>Repair damaged computing equipment</th>
                                    <td>{{ $step->q3 }}</td>
                                </tr>
                                <tr>
                                    <th>Oversee all aspects of a computing departments</th>
                                    <td>{{ $step->q4 }}</td>
                                </tr>
                                <tr>
                                    <th>Help a client make business decisions</th>
                                    <td>{{ $step->q5 }}</td>
                                </tr>
                                <tr>
                                    <th>Help a client make business decisions</th>
                                    <td>{{ $step->q6 }}</td>
                                </tr>
                                <tr>
                                    <th>Analyze data using modern computer tools</th>
                                    <td>{{ $step->q7 }}</td>
                                </tr>
                                  @empty
                                  <tr>
                                   <th>
                                   <a class="btn btn-success mb-2" href= "{{route('training.step_1') }}">Take Creear Test</a>
                                   </th>
                                  </tr>
                                  @endforelse
                                  @forelse($step_2 as $step2)
                                  <tr>
                                    <th colspan="10" style="padding:15px;"></th>
                                 </tr>
                                 <tr>
                                    <th colspan="10" style="padding:15px;"><span class="label label-primary" style="padding:5px;font-size: 20px;">STEP 2</span></th>
                                 </tr>
                                  <tr>
                                      <th>Involvement in exercise, sports, and games.</th>
                                      <td>{{ $step2->q1 }}</td>
                                  </tr>
                                  <tr>
                                      <th>Developing and using technology to produce and maintain things.</th>
                                      <td>{{ $step2->q2 }}</td>
                                  </tr>
                                  <tr>
                                      <th>Programming, maintaining, and providing support for software or hardware of computing devices.t</th>
                                      <td>{{ $step2->q3 }}</td>
                                  </tr>
                                  <tr>
                                    <th>Working with quantitative concepts and mathematical formulas.</th>
                                    <td>{{ $step2->q4 }}</td>
                                  </tr>
                                  <tr>
                                    <th>Instructing people.</th>
                                    <td>{{ $step2->q5 }}</td>
                                  </tr>
                                @empty
                                <p></p>  
                                @endforelse
                                @forelse($step_3 as $step3)
                                  <tr>
                                    <th colspan="10" style="padding:15px;"></th>
                                 </tr>
                                 <tr>
                                    <th colspan="10" style="padding:15px;"><span class="label label-primary" style="padding:5px;font-size: 20px;">STEP 3</span></th>
                                 </tr>
                                  <tr>
                                      <th>IInformation communication technology fundamentals</th>
                                      <td>{{ $step3->q1 }}</td>
                                  </tr>
                                  <tr>
                                      <th>Object oriented programming with java</th>
                                      <td>{{ $step3->q2 }}</td>
                                  </tr>
                                  <tr>
                                      <th>Data structures and algorithms</th>
                                      <td>{{ $step3->q3 }}</td>
                                  </tr>
                                  <tr>
                                    <th>Object oriented system analysis and design</th>
                                    <td>{{ $step3->q4 }}</td>
                                  </tr>
                                  <tr>
                                    <th>Database concepts and technologies</th>
                                    <td>{{ $step3->q5 }}</td>
                                  </tr>
                                  <tr>
                                      <th>Network infrastructure</th>
                                      <td>{{ $step3->q6 }}</td>
                                  </tr>
                                  <tr>
                                      <th>Object oriented software development with Visual Basic .NET</th>
                                      <td>{{ $step3->q7 }}</td>
                                  </tr>
                                  <tr>
                                      <th>Information Systems Development</th>
                                      <td>{{ $step3->q8 }}</td>
                                  </tr>
                                  <tr>
                                    <th>Network Server concepts</th>
                                    <td>{{ $step3->q9 }}</td>
                                  </tr>
                                  <tr>
                                    <th>Open source operating system : LINUX</th>
                                    <td>{{ $step3->q10 }}</td>
                                  </tr>
                                @empty
                                <p></p>  
                                @endforelse            
                                @forelse($step_4 as $step4)
                                <tr>
                                    <th colspan="10" style="padding:15px;"></th>
                                 </tr>
                                 <tr>
                                    <th colspan="10" style="padding:15px;"><span class="label label-primary" style="padding:5px;font-size: 20px;">STEP 4</span></th>
                                 </tr>
                                  <tr>
                                      <th>Which of the following best describes you interms of education</th>
                                      <td>{{ $step4->answer }}</td>
                                  </tr>
                                @empty
                                <p></p>
                                @endforelse                       
                                 @forelse($step_5 as $step5)
                                 <tr>
                                    <th colspan="10" style="padding:15px;"></th>
                                 </tr>
                                 <tr>
                                    <th colspan="10" style="padding:15px;"><span class="label label-primary" style="padding:5px;font-size: 20px;">STEP 5</span></th>
                                 </tr>
                                 <tr>
                                     <th>How Sure are you with the answers provided so far ?</th>
                                     <td>{{ $step5->answer }}</td>
                                 </tr>
                                 @empty
                                 <p></p>
                                 @endforelse
                           </tbody>
                        </table>
                    </div>
               </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end products-section -->
@endsection
