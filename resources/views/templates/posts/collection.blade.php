<div class="timeline-block">
    <div class = "row">

<div class="panel panel-default">
   <!------------------------------------Post With Single Image------------------------------------------------->
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
        <p>{{ $status->body }}</p>

<div class ="row">
            @foreach($status->collection->products as $product)



                  <div class = "col-sm-5" style = "border: 1px solid #CDCDCD;  margin:4%;min-height : 100px;">
                     <img  class = "img-responsive" style = ""  src="{{url($product->base_image)}}">
                     <p>{{$product->product_name}}</p>
                  </div>
                  @endforeach
            </div>



        <ul class="icon-list">
          
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
</div>              <!-------- One Post------>
