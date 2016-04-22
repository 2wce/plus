//code to handle the groups
//date 3/24/2016
//auther kudzai zishumba


//this function will populate a drop down with 
//friends as you are typing
function AddFriendToList(data)
{
	var freindsTAB = $("#friendsList");//this the tab that will hold the friends
	var freindINFO = "";//the is the element that holds information about the friends

	var json_data = JSON.parse(data);


    var looper=0;//this looper item indexes the 
	jQuery.each(json_data, function() {
	  
			  jQuery.each( json_data[looper], function(i, val) {

			  alert("key: " + json_data[looper].email + "value: " + 0);

			});

	looper++;//increment this looper item over each iteration
	  
	});

	

/*

	freindINFO = freindINFO + '<div class="fiendTab">';
	freindINFO = freindINFO + '<img src="data:image/jpeg;base64,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" />';
	freindINFO = freindINFO + '<div class="freind-name">';
	freindINFO = freindINFO + '<h3>Robert Gabriel Mugabe</h3>';
	freindINFO = freindINFO + '<h5>Add to group</h5>';
	freindINFO = freindINFO + '</div><!--freind-name--> ';
	freindINFO = freindINFO + '</div><!--fiendTab-->';
    freindsTAB.append(freindINFO);
*/

}


//returns a list of all the friends
//based on the search term
function getFiendsList(searchTerm)
{

				var jqxhr = $.get( "groups?searchTerm="+searchTerm, function(data) {
				AddFriendToList(data);//pass the data to the function
				




				})
				  .done(function() {
				    //alert( "second success" );
				  })
				  .fail(function(data) {
				    alert( "error line 27 handle-groups.js " +data );
				  })
				  .always(function() {
				   // alert( "finished" );
				  });

}

//register an event on keydown
$('#txtGroupname').on("keyup",function(){
	

	var word = $('#txtGroupname').val();
	if(word!=""&&word!=null)
	     getFiendsList(word);
	
});


function CreatGroup()
{
	
}