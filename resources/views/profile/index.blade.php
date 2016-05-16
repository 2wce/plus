
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
                            <div class = "col-sm-10">
                            <ol class="breadcrumb">



                           <div class="cover profile">
                   <div class="wrapper">

                             <img src="{{url("banner.png")}}" alt="{{url("banner.png")}}" />


                   </div>
                   <div class="cover-info">


                     <ul class="cover-nav">
                         <li ><a href="{{ route('profile.index.timeline', ['username' => $user->username]) }}"><i class="fa fa-newspaper-o"></i> Timeline</a>
                         </li>
                         <li><a href="{{ route('profile.index.products', ['username' => $user->username]) }}"><i class="fa fa-tablet"></i>Products</a>
                         </li>
                         <li><a href="#"><i class="fa fa-tty"></i> Service Portofilo</a>
                         </li>
                         <li class="active" ><a href="{{ route('profile.index.network') }}"><i class="fa fa-fw fa-users"></i> Network</a>
                         </li>
                         <li><a href="user-public-users.html"><i class="fa fa-spinner"></i> Radar</a>
                         </li>
                         <li><a href="{{ route('profile.index.collections', ['username' => $user->username]) }}"><i class="fa fa-server"></i> Collections</a>
                         </li>

                         <li><a href="user-public-users.html"><i class="fa fa-tachometer"></i> Stats</a>
                         </li>

                     </ul>
                   </div>
               </div>
                      <!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->
<div class="about-area">
  <h4>{{ $user->getFirstnameOrUsername() }}'s Friends</h4>

  @if ( ! $user->friends()->count())
    <p>{{ $user->getFirstnameOrUsername() }} currently has no friends</p>
  @else
    @foreach ($user->friends() as $user)
      <p>{{$user->getFirstnameorUsername()}} </p>

      <p> {{$user->profilePic}}</p>

        <img src="{{$user->profilePic}}" class="img-responsive img-circle">

    @endforeach
  @endif
</div>

<div class = "row">

<div class="col-md-4" style = "padding-right:2%">

<div class="row profile">
<div class="profile-sidebar">
<!-- SIDEBAR USERPIC -->
<div class="profile-userpic">
   <img src="images/people/110/guy-9.jpg" alt="people" class="img-responsive">
</div>
<!-- END SIDEBAR USERPIC -->
<!-- SIDEBAR USER TITLE -->
<div class="profile-usertitle">
  <div class="profile-usertitle-name">
    Marcus Doe
  </div>
  <div class="profile-usertitle-job">
    Developer
  </div>
</div>
<!-- END SIDEBAR USER TITLE -->
<!-- SIDEBAR BUTTONS -->
<div class="profile-userbuttons">
  <button type="button" class="btn btn-success btn-sm">Follow</button>
  <button type="button" class="btn btn-danger btn-sm">Message</button>
</div>
<!-- END SIDEBAR BUTTONS -->
<!-- SIDEBAR MENU -->

<!-- END MENU -->
</div>
</div>

</div>

<div class="col-md-4"  style = "padding-right:2%">

<div class="row profile">

<div class="profile-sidebar">
<!-- SIDEBAR USERPIC -->
<div class="profile-userpic">
   <img src="images/people/110/guy-9.jpg" alt="people" class="img-responsive">
</div>
<!-- END SIDEBAR USERPIC -->
<!-- SIDEBAR USER TITLE -->
<div class="profile-usertitle">
  <div class="profile-usertitle-name">
    Marcus Doe
  </div>
  <div class="profile-usertitle-job">
    Developer
  </div>
</div>
<!-- END SIDEBAR USER TITLE -->
<!-- SIDEBAR BUTTONS -->
<div class="profile-userbuttons">
  <button type="button" class="btn btn-success btn-sm">Follow</button>
  <button type="button" class="btn btn-danger btn-sm">Message</button>
</div>
<!-- END SIDEBAR BUTTONS -->
<!-- SIDEBAR MENU -->

<!-- END MENU -->
</div>
</div>

</div>
<div class="col-md-4 connect">
<div class="row profile">

<div class="profile-sidebar">
<!-- SIDEBAR USERPIC -->
<div class="profile-userpic">
   <img src="images/people/110/guy-9.jpg" alt="people" class="img-responsive">
</div>
<!-- END SIDEBAR USERPIC -->
<!-- SIDEBAR USER TITLE -->
<div class="profile-usertitle">
  <div class="profile-usertitle-name">
    Marcus Doe
  </div>
  <div class="profile-usertitle-job">
    Developer
  </div>
</div>
<!-- END SIDEBAR USER TITLE -->
<!-- SIDEBAR BUTTONS -->
<div class="profile-userbuttons">
  <button type="button" class="btn btn-success btn-sm">Follow</button>
  <button type="button" class="btn btn-danger btn-sm">Message</button>
</div>
<!-- END SIDEBAR BUTTONS -->
<!-- SIDEBAR MENU -->

<!-- END MENU -->
</div>
</div>

</div>











                  </div> <!---- End of Timeline and Middle Content  -------->


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
