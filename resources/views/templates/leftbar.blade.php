<div class="static-sidebar-wrapper sidebar-default">
    <div class="static-sidebar">
        <div class="sidebar">
<div class="widget">
<div class="widget-body">
<div class="userinfo">
<div class="avatar">
    <img src="{{url(Auth::user()->profilePic)}}" class="img-responsive img-circle">
</div>
<div class="info">
<a href="{{ route('profile.index.timeline', ['username' => Auth::user()->username]) }}"><span class="username">{{ Auth::user()->getNameOrUsername() }}</span>
<span class="useremail">{{Auth::user()->location}}</span></a>
</div>
</div>
</div>
</div>
<div class="widget stay-on-collapse" id="widget-sidebar">
<nav role="navigation" class="widget-body">
<ul class="acc-menu">
<li class="nav-separator"><span>Explore</span></li>

@foreach($catnav as $cat)
<li><a href="javascript:;"><i class="{{$cat->category_icon}}"></i><span>{{$cat->category_name}}</span></a>
<ul class="acc-menu">
  <li> <a href = "{{ route('categories.show', ['id' => $cat->id]) }}">{{$cat->category_name}} </a>  </li>
<li><a href="maps-google.html">Google Maps</a></li>
<li><a href="maps-jvectormap.html">jVectorMap</a></li>
<li><a href="maps-mapael.html">Mapael</a></li>
</ul>
</li>
@endforeach

<li class="nav-separator"><span>Extras</span></li>
<li><a href="app-inbox.html"><i class="ti ti-email"></i><span>Inbox</span><span class="badge badge-danger">3</span></a></li>
<li><a href="extras-calendar.html"><i class="ti ti-calendar	"></i><span>Calendar</span><span class="badge badge-orange">1</span></a></li>
</ul>
</nav>
</div>

<div class="widget" id="widget-progress">
<div class="widget-heading">
Progress
</div>
<div class="widget-body">

<div class="mini-progressbar">
<div class="clearfix mb-sm">
    <div class="pull-left">Bandwidth</div>
    <div class="pull-right">50%</div>
</div>

<div class="progress">
    <div class="progress-bar progress-bar-lime" style="width: 50%"></div>
</div>
</div>
<div class="mini-progressbar">
<div class="clearfix mb-sm">
    <div class="pull-left">Storage</div>
    <div class="pull-right">25%</div>
</div>

<div class="progress">
    <div class="progress-bar progress-bar-info" style="width: 25%"></div>
</div>
</div>

</div>
</div>
</div>
    </div>
</div>
