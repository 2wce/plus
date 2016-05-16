


@extends('templates.default')

@section('content')

 





    <!--------------------header------------------------>

          @include('templates.header')

    <!--------------------- end of header---------------------->

          <div id="wrapper">
              <div id="layout-static">


                <!----Left Bar--->

                    @include('templates.leftbar')
                <!----End Left Bar--->



                  <div class="static-content-wrapper">
                      <div class="static-content">
                          <div class="page-content">
                            <div class="row" style = "margin:0;">
                              <div class = "col-sm-9">
                              <ol class="breadcrumb">




                        


                             



                                <div class="row" style = "background-color : #ffffff">
                                    <div class="col-lg-12">


                                  
                          @include('templates.statusfrom')



              <!------ TimeLine and its components --------------------->








                                @include('timeline.partials.statuses')



                                      
                          


                                    </div>
                                  
                                  </div>


                       </div> <!---- End of Timeline and Middle Content  -------->
 
   <div class = "col-sm-3">

                                       @include('templates.activity')


                                      </div>

                             
                            </div>
                          </div> <!-- #page-content -->
                      </div>
                      <footer role="contentinfo">
      <div class="clearfix">

          <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
      </div>
  </footer>

                  </div>
              </div>
          </div>


@stop
