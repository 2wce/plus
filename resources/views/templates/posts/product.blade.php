<div class="timeline-block">
            <div class = "row">

     <div class="panel panel-default">
           <!------------------------------------Post With Product Image------------------------------------------------->

       <div class = "row">


         <div class = "col-sm-3">


           <div class="media">



             <a href="" class="pull-left">

                 <img src="{{url($status->user->profilePic)}}" class="img-responsive img-circle">

             </a>
             <div class="media-body">
                 <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                 <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a>
                 <span>on 15th January, 2014</span>
             </div>
         </div>


         </div>

         <div class = "col-sm-9">







           <div class="panel panel-default profile-card">
                       <div class="panel-body">


                        <div class = "row">
                                @foreach( $status->product->images as $image )
                              <div class = "col-sm-4">  <img src="{{url($image->image_path)}}" style = "max-height : 100px; max-width : auto;"class="img-responsive">  </div>

                                    @endforeach

                            </div>

                            <br>
                            <br>


                           <div class="profile-card-icon">
                             	<a href="{{ route('products.show', $status->product->id) }}" >
                               <img src="{{url($status->product->base_image)}}" style = "max-height : 200px;"class="img-responsive">
                             </a>
                           </div>
                           <h4 class="text-center">{{ $status->body }}</h4>
                           <ul class="profile-card-items">
                               <li><i class="fa fa-map-marker"></i> Harare, Zimbabwe</li>
                               <li><i class="fa fa-check-square"></i> 	{{$status->product->cond}}</li>
                               <li><i class="fa fa-money"></i> 	${{$status->product->price}}</li>
                           </ul>
                       </div>
                   </div>
                   <ul class="icon-list">
                       <li><i class="fa fa-plus-square"></i> Saves</li>
                       <li><i class="fa fa-clock-o fa-fw"></i>  {{ $status->created_at->diffForHumans() }}</li>
                        <li><i class="fa fa-share-alt"></i>  Share</li>
                        <li><i class="fa fa-warning"></i>  Report</li>


                    <li><a href="{{ route('status.like', $status->id) }}">Like</a></li>

                       <li><i class="fa fa-thumbs-o-up"></i> {{$status->likes->count()}} {{str_plural('like',$status->likes->count() )}}</li>
                   </ul>
                  @include('templates.posts.comments')
         </div>






       </div>






     </div>
 </div>
   </div>
