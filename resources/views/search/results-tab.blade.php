
<style>
#txtFil
{

opacity: 0;
    filter:alpha(opacity=0);
    -moz-opacity:0;
    -khtml-opacity: 0;
    position: absolute;

    z-index: 20;
    cursor: pointer;
}
#anch
{
    position: absolute;

    z-index: 10;

}



</style>

             <div class="tabs" style="max-width:800px;margin-left : 0%;">

	    <input type="radio" name="tabs" id="tab1" checked >
	    <label for="tab1">
	        <i class="fa fa-quote-left"></i><span>Showing Post  </span>
	    </label>

	    <input type="radio" name="tabs" id="tab2">
	    <label for="tab2">
	        <i class="fa fa-desktop"></i><span>Showing People</span>
	    </label>

	    <input type="radio" name="tabs" id="tab3">
	    <label for="tab3">
	        <i class="fa fa-wrench"></i><span>Showing Products </span>
	    </label>

	    <div id="tab-content1" class="tab-content">

        	<h3>Your search for "{{ Request::input('query') }}"</h3>

          @if (!$users->count())
        		<p>No results found.</p>
        	@else

        <div class = "row">
          	@foreach ($users as $user)

        <div class="col-md-4" style = "padding-right:2%">

        <div class="row profile">
        <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
           <img   src="{{url($user->profilePic)}}" alt="people" style ="width: 150px; max-height:150px;" class="img-responsive">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
          {{$user->getFirstnameorUsername()}}
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
        @endforeach

      </div>
      @endif

	    </div> <!-- #tab-content1 -->

	    <div id="tab-content2" class="tab-content">

      <h3>Your search for "{{ Request::input('query') }}"</h3>
	    </div> <!-- #tab-content2 -->

	    <div id="tab-content3" class="tab-content">

      <h3>Your search for "{{ Request::input('query') }}"</h3>

	    </div> <!-- #tab-content3 -->

	</div> <!-- .tabs -->
