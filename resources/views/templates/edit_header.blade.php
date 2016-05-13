<style>

.tabbable-panel {

}

/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #737373;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
  border-bottom: 4px solid #fbcdcf;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 4px solid #f3565d;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -3px;
  background-color: #fff;
  border: 0;
  border-top: 1px solid #eee;
  padding: 15px 0;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}

/* Below tabs mode */

.tabbable-line.tabs-below > .nav-tabs > li {
  border-top: 4px solid transparent;
}
.tabbable-line.tabs-below > .nav-tabs > li > a {
  margin-top: 0;
}
.tabbable-line.tabs-below > .nav-tabs > li:hover {
  border-bottom: 0;
  border-top: 4px solid #fbcdcf;
}
.tabbable-line.tabs-below > .nav-tabs > li.active {
  margin-bottom: -2px;
  border-bottom: 0;
  border-top: 4px solid #f3565d;
}
.tabbable-line.tabs-below > .tab-content {
  margin-top: -10px;
  border-top: 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px;
}



</style>






<header id="topnav" class="navbar navbar-default navbar-fixed-top" style = "background-color:; margin-bottom:10%;" role="banner" >

<div class="logo-area">
<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
<!----<span class="icon-bg">
  <i class="ti ti-menu"></i>
</span>--->
</a>
</span>

<a class="navbar-brand" href="{{ route('home') }}">Plus Afrik</a>

<div class="toolbar-icon-bg hidden-xs" id="toolbar-search" style = "">
   <form action="{{ route('search.results') }}" role="search" >
    <div class="input-group">

<input type="text" name="query" class="form-control" placeholder="What are you looking for ?">
  <span class="input-group-btn"><button class="btn" type="submit"><i class="ti ti-search"></i></button></span>
<span class="input-group-btn"><button class="btn" type="button"><i class="ti ti-close"></i></button></span>
</div>
</form>
</div>

</div><!-- logo-area -->

<ul class="nav navbar-nav toolbar pull-right">

<li class="toolbar-icon-bg visible-xs-block" id="trigger-toolbar-search">
<a href="#"><span class="icon-bg"><i class="ti ti-search"></i></span></a>
</li>


@if(Auth::check())

<!---<li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}
</a></li>--->
<li><a data-toggle="modal" href="{{route('messages.index')}}">Messages</a></li>


<li><a href="{{ route('profile.edit') }}">Settings</a>
</li>

<li><a href="{{ route('auth.signout') }}">Sign out</a></li>
@else
<li><a href="{{ route('auth.signup') }}">Sign up</a></li>
<li><a href="{{ route('auth.signin') }}">Sign in</a></li>
@endif


<li class="dropdown toolbar-icon-bg">
<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-bell"></i></span><span class="badge badge-deeporange">2</span></a>
<div class="dropdown-menu notifications arrow">
<div class="topnav-dropdown-header">
  <span>Notifications</span>
</div>
<div class="scroll-pane">
  <ul class="media-list scroll-content">
    <li class="media notification-success">
      <a href="#">
        <div class="media-left">
          <span class="notification-icon"><i class="ti ti-check"></i></span>
        </div>
        <div class="media-body">
          <h4 class="notification-heading">Update 1.0.4 successfully pushed</h4>
          <span class="notification-time">8 mins ago</span>
        </div>
      </a>
    </li>
    <li class="media notification-info">
      <a href="#">
        <div class="media-left">
          <span class="notification-icon"><i class="ti ti-check"></i></span>
        </div>
        <div class="media-body">
          <h4 class="notification-heading">Update 1.0.3 successfully pushed</h4>
          <span class="notification-time">24 mins ago</span>
        </div>
      </a>
    </li>
    <li class="media notification-teal">
      <a href="#">
        <div class="media-left">
          <span class="notification-icon"><i class="ti ti-check"></i></span>
        </div>
        <div class="media-body">
          <h4 class="notification-heading">Update 1.0.2 successfully pushed</h4>
          <span class="notification-time">16 hours ago</span>
        </div>
      </a>
    </li>
    <li class="media notification-indigo">
      <a href="#">
        <div class="media-left">
          <span class="notification-icon"><i class="ti ti-check"></i></span>
        </div>
        <div class="media-body">
          <h4 class="notification-heading">Update 1.0.1 successfully pushed</h4>
          <span class="notification-time">2 days ago</span>
        </div>
      </a>
    </li>
    <li class="media notification-danger">
      <a href="#">
        <div class="media-left">
          <span class="notification-icon"><i class="ti ti-arrow-up"></i></span>
        </div>
        <div class="media-body">
          <h4 class="notification-heading">Initial Release 1.0</h4>
          <span class="notification-time">4 days ago</span>
        </div>
      </a>
    </li>
  </ul>
</div>
<div class="topnav-dropdown-footer">
  <a href="#">See all notifications</a>
</div>
</div>
</li>


</ul>






</header>
