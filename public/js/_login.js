//code to login the user

//auther kudzai zishumba

//date 2/14/2016

//the user enter email or mobile and password 

// server returns good and creates a session else returns bad and no session created


$(document).ready(function(e) {
    
	//btnlogin
    //txt_pass_login
    //txt_email_login
	$(btnlogin).click(function(e) {
      
		cozEmail(true);
		cozPass(true);
		
		//code to log in
		var email = $(txt_email_login).val();
		email = email.replace("@","%40");
		var pass  = $(txt_pass_login).val();
		
		if(email!==""&&pass!=="")
		{
			  $(btnlogin).text("Logging in");
			//do the login
			$.get("home/login?email="+email+"&pass="+pass, function(data, status){
				if(data.indexOf('good')>-1)
				{
				  window.location="home";//redirect to the profile page and auto create session	
				}
				else if(data='bad')
				{
					//show error message and set the time out to clear
					$(lblinfo).text("Email or password incorrect");
					setTimeout(function(){$(lblinfo).text("")},3000);
					$(btnlogin).text("Login");
					cozEmail(true,true);
					cozPass(true,true);
				}
				
		     }).done(function() {
				//alert( "second success" );
			  })
			  .fail(function() {
				    $(btnlogin).text("Login");
				    cozEmail(true,true);
					cozPass(true,true);
					$(lblinfo).text("oops something went wrong");
					setTimeout(function(){$(lblinfo).text("")},3000);
					
					
			  })
			  .always(function() {
				//alert( "finished" );
			  });
			 
			 
			
			 
			 
			 
			 
			 
		}//end if
		
		
    });//end btn click
	
	
	
	
	
});

$(txt_email_login).keyup(function(e) {
    //cozEmail(true);
});

//cozmetics for the login form

//coz email
function cozEmail(showerror,forceError)
{
	
	 var elem = $(txt_email_login).val();
	if(showerror==false)
	{
		if(elem!="")
		{
			//set the form feedback
			document.getElementById('_div_login_email').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_span_login_email').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
		}
		else if(elem=="")
		{
			//remove the from feedback
			document.getElementById('_div_login_email').setAttribute('class','form-group has-success');
			document.getElementById('_span_login_email').setAttribute('class','');
	
		}
	}
	
	else if(showerror==true)
	{
		if(elem!="")
		{
			//remove the from feedback
			document.getElementById('_div_login_email').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_span_login_email').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
	
		}
		else if(elem=="")
		{
			
		   //remove the from feedback and place a remove icon
			document.getElementById('_div_login_email').setAttribute('class','form-group has-error has-feedback');
			document.getElementById('_span_login_email').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		}
	}
	
	if(forceError)
	{
		document.getElementById('_div_login_email').setAttribute('class','form-group has-error has-feedback');
		document.getElementById('_span_login_email').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		
	}
	
}



//coz password
function cozPass(showerror,forceError)
{
	
	 var elem = $(txt_pass_login).val();
	if(showerror==false)
	{
		if(elem!="")
		{
			//set the form feedback
			document.getElementById('div_login_pass').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_span_login_pass').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
		}
		else if(elem=="")
		{
			//remove the from feedback
			document.getElementById('div_login_pass').setAttribute('class','form-group has-success');
			document.getElementById('_span_login_pass').setAttribute('class','');
	
		}
	}
	
	else if(showerror==true)
	{
		if(elem!="")
		{
			//remove the from feedback
			document.getElementById('div_login_pass').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_span_login_pass').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
	
		}
		else if(elem=="")
		{
			
		   //remove the from feedback and place a remove icon
			document.getElementById('div_login_pass').setAttribute('class','form-group has-error has-feedback');
			document.getElementById('_span_login_pass').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		}
	}
	
	if(forceError)
	{
		//remove the from feedback and place a remove icon
			document.getElementById('div_login_pass').setAttribute('class','form-group has-error has-feedback');
			document.getElementById('_span_login_pass').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		
	}
	
	
}