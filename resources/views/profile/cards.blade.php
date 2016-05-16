
<style>
/* entire container, keeps perspective */
.flip-container {
	perspective: 1000;
}
	/* flip the pane when hovered */
	.flip-container:hover .flipper, .flip-container.hover .flipper {
		transform: rotateY(180deg);
	}

.flip-container, .front, .back {
	width: 320px;
	height: 250px;
}

/* flip speed goes here */
.flipper {
	transition: 0.6s;
	transform-style: preserve-3d;

	position: relative;
}

/* hide back of pane during swap */
.front, .back {
	backface-visibility: hidden;

	position: absolute;
	top: 0;
	left: 0;
}

/* front pane, placed above back */
.front {
	z-index: 2;
	/* for firefox 31 */
	transform: rotateY(0deg);
}

/* back, initially hidden pane */
.back {
	transform: rotateY(180deg);
}
.cardLower{
  border-top:solid 2px $color3;
  background:$color2;
  width:419px;
  height:160px;
  position:relative;
  margin:0 auto;
margin: 2em auto;
  padding-bottom:20px
}

.bcard {
			border: solid 1px rgba(255, 255, 255, 0.6);
			border-bottom:2px solid green;
			background: rgba(255, 255, 255, 0.5);
      background-image: url("{{url('bc.jpg')}}");
      margin-left : 20%;
			width: 400px;
			height: 220px;


			-webkit-box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.4);
			box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.4);
		}
		.bcard2{
					border: solid 1px rgba(255, 255, 255, 0.6);
					border-bottom:2px solid green;
					background: rgba(255, 255, 255, 0.5);
		      background-image: url("{{url('bc2.jpg')}}");
		      margin-left : 20%;
					width: 400px;
					height: 220px;


					-webkit-box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.4);
					box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.4);
				}
    .border-top {
    			float:left;
    			border-top:solid 5px;
    			margin:0;
    		}
    		.red {
    			border-color:red;
    			width:15%;
    		}
    		.white {
    			border-color:white;
    			width:30%;
    		}
    		.green {
    			border-color:green;
    			width:55%;
    		}


</style>


@extends('templates.default')

@section('content')

	<h3>Update your profile</h3>





    <!--------------------header------------------------>

          @include('templates.edit_header')

    <!--------------------- end of header---------------------->

          <div id="wrapper">
              <div id="layout-static">


                <!----Left Bar--->

                    @include('templates.edit_leftbar')
                <!----End Left Bar--->



                  <div class="static-content-wrapper">
                      <div class="static-content">
                          <div class="page-content">
                            <div class="row" style = "margin:0;">
                              <div class = "col-sm-10">
                              <ol class="breadcrumb">

                                <div class="row" style = "background-color : #ffffff">
                                    <div class="col-lg-12">


                                    <h3>  Business Cards </h3>

																		<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
	<div class="flipper">
		<div class="front">
			<div class="bcard">
<div class="border-top red"></div>
<div class="border-top white"></div>
<div class="border-top green"></div>
<div class = "row">

<div class = "col-sm-5">
<br>
<img src = "{{url('bl.png')}}" width ="200" class = "img-responsive">

</div>
<div class = "col-sm-7">
<h4> Tinashe Chafanza</h4>
<p>Software Engineer </p>
<span class="phone">E:tcha87@gmail.com</span>


</div>
</div>
<div class = "row">
<div class = "col-sm-12" style = "text-align : center">
<h2>Smart Studios </h2>
</div>
</div>


</div>
		</div>
		<div class="back">
			<div class="bcard2">
<div class="border-top red"></div>
<div class="border-top white"></div>
<div class="border-top green"></div>
<div class = "row">

<div class = "col-sm-5">
<br>
<img src = "{{url('bl.png')}}" width ="200" class = "img-responsive">

</div>
<div class = "col-sm-7">
<h4> Tinashe Chafanza</h4>
<p>Software Engineer </p>
<span class="phone">E: 763.772.6504</span>


</div>
</div>
<div class = "row">
<div class = "col-sm-12" style = "text-align : center">
<h2>Smart Studios </h2>
</div>
</div>


</div>
		</div>
	</div>
</div>





                                      <form class="form-vertical" role="form"  enctype="multipart/form-data" method="post" action"{{ route('profile.edit') }}">

                                        <div class="row">

                                          <div class="col-lg-6">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                              <label for="first_name" class="control-label">First name</label>
                                              <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name') ?: Auth::user()->first_name }}">
                                                      @if ($errors->has('first_name'))
                                                        <span class="help-block">{{ $errors->first('first_name') }}</span>
                                                      @endif
                                            </div>
                                          </div>

                                          <div class="col-lg-6">
                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                              <label for="last_name" class="control-label">Last name</label>
                                              <input type="text" name="last_name" class="form-control" id="last_name" value="{{  old('last_name') ?: Auth::user()->last_name }}">
                                                      @if ($errors->has('last_name'))
                                                        <span class="help-block">{{ $errors->first('last_name') }}</span>
                                                      @endif
                                            </div>
                                          </div>

                                        </div>

                                        <div class="form_group{{ $errors->has('location') ? ' has-error' : '' }}">
                                          <label for="location" class="control-label">Location</label>
                                          <input type="text" name="location" class="form-control" id="location" value="{{ old('location') ?: Auth::user()->location }}">
                                                  @if ($errors->has('location'))
                                                    <span class="help-block">{{ $errors->first('location') }}</span>
                                                  @endif
                                        </div>

                                        <br>



                                        <div class="form_group{{ $errors->has('location') ? ' has-error' : '' }}">
                                          <label for="location" class="control-label">Phone Number</label>
                                          <input type="text" name="location" class="form-control" id="location" value="{{ old('location') ?: Auth::user()->location }}">
                                                  @if ($errors->has('location'))
                                                    <span class="help-block">{{ $errors->first('location') }}</span>
                                                  @endif
                                        </div>
                                <br>

                                         <img  class = "img-responsive" style = "max-width : 150px;"  src="{{url(Auth::user()->profilePic)}}">
                                        <div class="form-group">
                                          <label class="col-sm-4 control-label">Profile Picture</label>
                                          <div class="col-sm-8">
                                           <input type="file" name="base_image" class="form-control" id="base_image">
                                         </div>
                                           @if($errors->has('base_image'))
                                               <span class = "help-block"> {{ $errors->first('base_image') }}</span>
                                           @endif

                                       </div>

                                        <div class="form-group">
                                          <button tupe="submit" class="btn btn-default">Update</button>
                                        </div>

                                        <input type="hidden" name="_token" value="{{ Session::token() }}" >

                                      </form>


                                    </div>
                                  </div>


                       </div> <!---- End of Timeline and Middle Content  -------->


                              <div class = "col-sm-2">

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
