//code to send an email from the home page 


//auther kudzai zishumba

//date 2/17/2016

$(document).ready(function(e) {
    
	$(btn_email_send).click(function(e) {
       
	   
	   
		//grab the values
		var email_name    = $(txt_email_name).val();
		var email_company = $(txt_email_company).val();
		var email_email   = $(txt_email_email).val();
		var email_message = $(txt_email_message).val();
		
		if(email_name=="")
		{
			 $(div_email_name).attr("class",'form-group has-error has-feedback');
			 $(span_email_name).attr("class","glyphicon glyphicon-remove form-control-feedback");
		}
		else if(email_name!="")
		{
			 $(div_email_name).attr("class",'form-group has-success has-feedback');
			 $(span_email_name).attr("class","glyphicon glyphicon-ok form-control-feedback");
		}
		
		if(email_company=="")
		{
			 $(div_email_company).attr("class",'form-group has-error has-feedback');
			 $(span_email_company).attr("class","glyphicon glyphicon-remove form-control-feedback");
		}
		
		else if(email_company!="")
		{
			 $(div_email_company).attr("class",'form-group has-success has-feedback');
			 $(span_email_company).attr("class","glyphicon glyphicon-ok form-control-feedback");
		}
		
		
		if(email_email=="")
		{
			 $(div_email_email).attr("class",'form-group has-error has-feedback');
			 $(span_email_email).attr("class","glyphicon glyphicon-remove form-control-feedback");
		}
		else if(email_email!="" && validEmail_email($(txt_email_email).val()))
		{
			$(div_email_email).attr("class",'form-group has-success has-feedback');
		    $(span_email_email).attr("class","glyphicon glyphicon-ok form-control-feedback");
		}
		
		if(email_message=="")
		{
			 $(div_email_message).attr("class",'form-group has-error has-feedback');
			 $(span_email_message).attr("class",'glyphicon glyphicon-remove form-control-feedback');
	    }
		
		else if(email_message!="")
		{
			 $(div_email_message).attr("class",'form-group has-success has-feedback');
			 $(span_email_message).attr("class",'glyphicon glyphicon-ok form-control-feedback');
	  	}
		
		
		var email_name    = $(txt_email_name).val();
		var email_company = $(txt_email_company).val();
		var email_email   = $(txt_email_email).val();
		var email_message = $(txt_email_message).val();
		
		if(
		   email_name    !=""&&
		   email_company !=""&&
		   email_email   !=""&&
		   email_message !=""&& 
		   validEmail_email($(txt_email_email).val())
		   )
		   
		   {
			   $(btn_email_send).text("Sending Message...");
			   
			   //hit ajax code to send the email
			   $.get("home/email?name="+email_name+"&company="+email_company+"&email="+email_email+"&msg="+email_message, function(data, status){
			
			
			if(data!='1')
			{
			   $(btn_email_send).text("An Error occured");	
			   setTimeout( $(btn_email_send).text(" Send "),3000);
			}
			else if(data=='1')
			{
				alert("message successfully sent");
				clear_all_fields();
			}
			$(btn_email_send).text(" Send ");			
	      	
			}).fail(function() {
				   alert("an error occured");
			  })
			  .always(function() {
				//alert( "finished" );
			  });//end get
		
			   
		   }
		
		
		
		
		
		
	
		
		
	
    });//button click
	
	

	
	
});//document .ready function



//function to validate email

function validEmail_email(elem)
{
	var _email = elem;
	var valid=false;
	if(_email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)!=null)
	{
		    valid=true;
		    $('[data-toggle="_email_email"]').popover('destroy'); 
			$('[data-toggle="_email_email"]').popover('hide');
	}
	else 
	{
		$('[data-toggle="_email_email"]').popover(); 
		$(txt_email_email).click();
		valid=false;
	}
	return valid;
}


function cozmetisizeAll()
{
	    //grab the values
		var email_name    = $(txt_email_name).val();
		var email_company = $(txt_email_company).val();
		var email_email   = $(txt_email_email).val();
		var email_message = $(txt_email_message).val();
		
		if(email_name=="")
		{
			 $(div_email_name).attr("class",'form-group has-error has-feedback');
			 $(span_email_name).attr("class","glyphicon glyphicon-remove form-control-feedback");
		}
		else if(email_name!="")
		{
			 $(div_email_name).attr("class",'form-group has-success has-feedback');
			 $(span_email_name).attr("class","glyphicon glyphicon-ok form-control-feedback");
		}
		
		if(email_company=="")
		{
			 $(div_email_company).attr("class",'form-group has-error has-feedback');
			 $(span_email_company).attr("class","glyphicon glyphicon-remove form-control-feedback");
		}
		
		else if(email_company!="")
		{
			 $(div_email_company).attr("class",'form-group has-success has-feedback');
			 $(span_email_company).attr("class","glyphicon glyphicon-ok form-control-feedback");
		}
		
		
		if(email_email=="")
		{
			 $(div_email_email).attr("class",'form-group has-error has-feedback');
			 $(span_email_email).attr("class","glyphicon glyphicon-remove form-control-feedback");
		}
		else if(email_email!="")
		{
			$(div_email_email).attr("class",'form-group has-success has-feedback');
		    $(span_email_email).attr("class","glyphicon glyphicon-ok form-control-feedback");
		}
		
		if(email_message=="")
		{
			 $(div_email_message).attr("class",'form-group has-error has-feedback');
			 $(span_email_message).attr("class",'glyphicon glyphicon-remove form-control-feedback');
	    }
		
		else if(email_message!="")
		{
			 $(div_email_message).attr("class",'form-group has-success has-feedback');
			 $(span_email_message).attr("class",'glyphicon glyphicon-ok form-control-feedback');
	  	}
		
}

//function to clear all
function clear_all_fields()
{
	    
		 $(txt_email_name)    .val("");
		 $(txt_email_company) .val("");
		 $(txt_email_email)   .val("");
		 $(txt_email_message) .val("");
		
		
			 $(div_email_name).attr("class",'form-group has-sucess has-feedback');
			 $(span_email_name).attr("class","");
		
				
			 $(div_email_company).attr("class",'form-group has-sucess has-feedback');
			 $(span_email_company).attr("class","");
		
		
			 $(div_email_email).attr("class",'form-group has-sucess has-feedback');
			 $(span_email_email).attr("class","");
		
			 $(div_email_message).attr("class",'form-group has-sucess has-feedback');
			 $(span_email_message).attr("class",'');
	   
		
}

