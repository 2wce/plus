
<!-- shows statuses and replies plus reply forms for each status -->

@if (!$statuses->count())
	<p>There is nothing in this timeline, yet.</p>
@else
	@foreach ($statuses as $status)

     	@if($status->type_id == 0)

          @include('templates.posts.image')

			@endif

			@if($status->type_id == 1)

          @include('templates.posts.product')

			@endif

			@if($status->type_id == 2)

          @include('templates.posts.service')

			@endif
			@if($status->type_id == 4)

          @include('templates.posts.collection')

			@endif











		<div class="media">



		        @foreach ( $status->replies as $reply )



		        @endforeach

		        <!-- show input textarea to reply to this status -->

		    </div>

	@endforeach

	{!! $statuses->render() !!}

@endif
