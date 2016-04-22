
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
                         <li ><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}"><i class="fa fa-newspaper-o"></i> Timeline</a>
                         </li>
                         <li class="active"><a href="{{ route('products.index') }}"><i class="fa fa-tablet"></i>Products</a>
                         </li>
                         <li><a href="user-public-profile.html"><i class="fa fa-tty"></i> Service Portofilo</a>
                         </li>
                         <li  ><a href="profile-network.html"><i class="fa fa-fw fa-users"></i> Network</a>
                         </li>
                         <li><a href="user-public-users.html"><i class="fa fa-spinner"></i> Radar</a>
                         </li>
                         <li><a href="{{ route('collections.index') }}"><i class="fa fa-server"></i> Collections</a>
                         </li>

                         <li><a href="user-public-users.html"><i class="fa fa-tachometer"></i> Stats</a>
                         </li>

                     </ul>
                   </div>
               </div>

               <div class="main">
          <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
          <div class="cbp-vm-options">
           <a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
           <a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list">List View</a>
          </div>
          <ul>
            @foreach($products as $product)
           <li>
             <a class="cbp-vm-image" href="#"><img src="{{url($product->base_image)}}"></a>
             <h3 class="cbp-vm-title">{{ $product->product_name }}</h3>
             <div class="cbp-vm-price">${{ $product->price }}</div>
             <div class="cbp-vm-details">
              {{ $product->product_description }}
             </div>

           </li>
           @endforeach


          </ul>
          </div>
          </div><!-- /main -->













                     </div> <!---- End of Timeline and Middle Content  -------->


                            <div class = "col-sm-2">
                              <div class="sidebar1 right">

    <ul class="chat-filter nav nav-pills ">
        <li class="active"><a href="#" data-target="li">All</a>
        </li>
        <li><a href="#" data-target=".online">Online</a>
        </li>
        <li><a href="#" data-target=".offline">Offline</a>
        </li>
    </ul>
    <ul class="chat-contacts">
        <li class="online" data-user-id="1">
            <a href="#">
                <div class="media">
                    <div class="pull-left">
                        <span class="status"></span>
                        <img src="{{url(Auth::user()->profilePic)}}" width="40" class="img-circle" />
                    </div>
                    <div class="media-body">
                        <div class="contact-name">{{ Auth::user()->getNameOrUsername() }}</div>
                        <small>"Free Today"</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="online away" data-user-id="2">
            <a href="#">
                <div class="media">
                    <div class="pull-left">
                        <span class="status"></span>
                        <img src="{{url(Auth::user()->profilePic)}}" width="40" class="img-circle" />
                    </div>
                    <div class="media-body">
                        <div class="contact-name">{{ Auth::user()->getNameOrUsername() }}</div>
                        <small>"Feeling Groovy"</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="online" data-user-id="3">
            <a href="#">
                <div class="media">
                    <div class="pull-left">
                        <span class="status"></span>
                        <img src="{{url(Auth::user()->profilePic)}}" width="40" class="img-circle" />
                    </div>
                    <div class="media-body">
                        <div class="contact-name">{{ Auth::user()->getNameOrUsername() }}</div>
                        <small>Busy</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="offline" data-user-id="4">
            <a href="#">
                <div class="media">
                    <div class="pull-left">
                        <img src="{{url(Auth::user()->profilePic)}}" width="40" class="img-circle" />
                    </div>
                    <div class="media-body">
                        <div class="contact-name">{{ Auth::user()->getNameOrUsername() }}</div>
                        <small>Offline</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="offline" data-user-id="4">
            <a href="#">
                <div class="media">
                    <div class="pull-left">
                        <img src="{{url(Auth::user()->profilePic)}}" width="40" class="img-circle" />
                    </div>
                    <div class="media-body">
                        <div class="contact-name">{{ Auth::user()->getNameOrUsername() }}</div>
                        <small>Offline</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="offline" data-user-id="4">
            <a href="#">
                <div class="media">
                    <div class="pull-left">
                        <img src="{{url(Auth::user()->profilePic)}}" width="40" class="img-circle" />
                    </div>
                    <div class="media-body">
                        <div class="contact-name">{{ Auth::user()->getNameOrUsername() }}</div>
                        <small>Offline</small>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <div class="chat-search">
        <input type="text" class="form-control" placeholder="Search" />
    </div>
</div>
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