//initialize the jquery dom
$(document).ready(function(){


/* code to sign up and to validate the  sign up process for invalid values
 * auther kudzai zishumba
 * date 2-12-16 
 * all custom js code goes at the bottom
 */
 
 
 
 

 
	//register the get connected image to scroll up
	$(imggetconnected).click(function(e) {
        window.scroll(0,0);//to-do fix the scroll speeed to be a smooth scroll
    });
	
	
	//function to show popups on the btnsign up.click
	//on click the btn login show validation errors
	$(_btnsignup).click(function(){
		
		//call the cozmetic functions here
		cozname(true);
		cozsname(true);
		cozemail(true);
		cozpassw1(true);
		cozpassw2(true);
		
		//get reference to the boxes
		  var txtfname         = $(_txtfname).val();
		  var txtsname         = $(_txtsurname).val();
		  var txtmobileoremail = $(_txtemailormobile).val();
		  var txtpassword1     = $(_txtpassword1).val();
		  var txtpassword2     = $(_txtpassword2).val();
		 
		 
		 //create a execute the pop overs
		  if(txtfname == "")
		  {  
		      $('[data-toggle="_infoname"]').popover(); 
		      $(_txtfname).click();
		  }
		  
		
		  
		 else if(txtsname == "")
		  {  
		      $('[data-toggle="_infosname"]').popover(); 
		      $(_txtsurname).click();
		  }
		  
		  
		  else if(txtmobileoremail == "")
		  {  
		      $('[data-toggle="_infomobileoremail"]').popover(); 
		      $('_txtemailormobile').click();
		  }
		  
		  
		  else if(txtpassword1 == "")
		  {  
		      $('[data-toggle="_infopassword1"]').popover(); 
		      $(_txtpassword1).click();
		  }
		  
		  
		  else if(txtpassword2 == "")
		  {  
		     $('[data-toggle="_infopassword2"]').popover(); 
		     $(_txtpassword2).click();
		  }
		  
		 
		  
		  
	});
	
  
	  






	
	////////////////////////////////////////////////////////////////////////////////////////////
	$(_txtfname).keydown(function(){
		if(_txtfname.value!=null)//remove the attribute
		{
			$('[data-toggle="_infoname"]').popover('hide'); 
			$('[data-toggle="_infoname"]').popover('destroy'); 
		}
	});
	
	
	
	$(_txtfname).click(function(){
      if($(_txtfname).val()!="")//remove the attribute
	  {
		    $('[data-toggle="_infoname"]').popover('hide');
            $('[data-toggle="_infoname"]').popover('destroy'); 
			
	  }
	});
	////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	////////////////////////////////////////////////////////////////////////////////////////////
	$(_txtsurname).keydown(function(){
		if(_txtsurname.value!="")//remove the attribute
		{
		    $('[data-toggle="_infosname"]').popover('destroy'); 
			$('[data-toggle="_infosname"]').popover('hide');
		}
	});
	
	$(_txtsurname).click(function(){
      if(_txtsurname.value!="")//remove the attribute
	  {
            $('[data-toggle="_infosname"]').popover('destroy'); 
			$('[data-toggle="_infosname"]').popover('hide');	
	  }
	});
	////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	////////////////////////////////////////////////////////////////////////////////////////////
	$(_txtemailormobile).keydown(function(){
		if(_txtemailormobile.value!="")//remove the attribute
		{
            $('[data-toggle="_infomobileoremail"]').popover('destroy'); 
			$('[data-toggle="_infomobileoremail"]').popover('hide');
		}
	});
	
	$(_txtemailormobile).click(function(){
      if(_txtemailormobile.value!="")//remove the attribute
	  {
            $('[data-toggle="_infomobileoremail"]').popover('destroy'); 
			$('[data-toggle="_infomobileoremail"]').popover('hide');
	  }
	});
	////////////////////////////////////////////////////////////////////////////////////////////
	
	
	////////////////////////////////////////////////////////////////////////////////////////////
	$(_txtpassword1).keydown(function(){
		if(_txtpassword1.value!="")//remove the attribute
		{
            $('[data-toggle="_infopassword1"]').popover('destroy'); 
			$('[data-toggle="_infopassword1"]').popover('hide');
		}
	});
	
	$(_txtpassword1).click(function(){
      if(_txtpassword1.value!="")//remove the attribute
	  {
            $('[data-toggle="_infopassword1"]').popover('destroy'); 
			$('[data-toggle="_infopassword1"]').popover('hide');
	  }
    });
	////////////////////////////////////////////////////////////////////////////////////////////
	
	
	////////////////////////////////////////////////////////////////////////////////////////////
	$(_txtpassword2).keydown(function(){
		if(_txtpassword2.value!="")//remove the attribute
		{
            $('[data-toggle="_infopassword2"]').popover('destroy'); 
			$('[data-toggle="_infopassword2"]').popover('hide');
		}
	});
	
	$(_txtpassword2).click(function(){
      if(_txtpassword2.value!="")//remove the attribute
	  {
		    $('[data-toggle="_infopassword2"]').popover('destroy'); 
			$('[data-toggle="_infopassword2"]').popover('hide');
	  }
	});
	////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	
	
});



//function to validate email

function validEmail(elem)
{
	var email = elem.value;
	var _email=email.replace(" ","");//remove all white spaces
    //elem.value=_email;
	var valid=false;
	if(_email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)!=null)
	{
		valid=true;
		    $('[data-toggle="_infomobileoremail"]').popover('destroy'); 
			$('[data-toggle="_infomobileoremail"]').popover('hide');
	}
	else 
	{
		document.getElementById('_txtemailormobile').setAttribute('data-content','invalid email');
		$('[data-toggle="_infomobileoremail"]').popover(); 
		$(_txtemailormobile).click();
		valid=false;
	}
	return valid;
}

//function to validate mobile

function validMobile(elem)
{
	var mobile = elem.value;
	var _mobile=mobile.replace(" ","");//remove all white spaces
	elem.value=_mobile;//return that value to the element
	
	var valid=false;
	
	
	if(mobile.length>=12&&mobile.indexOf("+")==0&&mobile.match(/^\+[0-9]+$/) != null)
	{
		//textBox.style.color='#00ff36';
		valid=true;
	}
	else
	{
		//textBox.style.color='#FF0000';
        valid= false;
	}
	return valid;
}


//function to validate non empty
function validNonEmpty(elem)
{
	var valid = false;
	//alert(elem);
	if(elem.value!="")
	{
		return true;
	}
	return valid;
}


//function to sign up
$(_btnsignup).click(function(){
				
	
			
	    //check that all fields are valid
		if(//if
		   validNonEmpty(document.getElementById('_txtfname'))&&
		   validNonEmpty(document.getElementById('_txtsurname'))&&
		   
		   (
		  // validMobile(document.getElementById('_txtemailormobile'))||
		   validEmail(document.getElementById('_txtemailormobile'))
		   )&&
		   
		   validNonEmpty(document.getElementById('_txtpassword1'))&&
		   validNonEmpty(document.getElementById('_txtpassword2'))&&
		   
		   (
		     validPasswords()//validates the passwords
		   )
		   
		   
		)//end if	
	{
		
		//begin sign up if all is valid
		//alert("jj");
		$(_btnsignup).text("+ Connecting");
		var name     = $(_txtfname).val();
		var surname  = $(_txtsurname).val();
		var email    = $(_txtemailormobile).val();
		var password = $(_txtpassword1).val();
		
		
		$.get("home/signup?name="+name+"&surname="+surname+"&email="+email+"&password="+password, function(data, status){
			
			
			if(data!='good')
			{
				//if(data.indexOf("msg")>-1)
				var options={
					placement:"right"
					,trigger:"click",
					content:data
				}
				document.getElementById('_txtemailormobile').setAttribute('data-content',data);
			  $('[data-toggle="_infomobileoremail"]').popover(options); 
		      $(_txtemailormobile).click();
		      cozemail(true,true);//force show error and invalid feedback
				
			}
			else if(data=='good')
			{
				//redirect to the home page
				//automatically create a session and start
				
				window.location='profile.html';//simulation of redirecting to the home page
			}
			$(_btnsignup).text("+ Connect");			
		}).fail(function() {
				   alert("an error occured");
			  })
			  .always(function() {
				//alert( "finished" );
			  });//end get
		
    }
	else 
	{
		//notify fill in details that some arw invalid
 		//alert("innvalid");
		
				
		
	}//end else
				
				
				
});//end the jquery dom


//funciton to validate the paswords
function validPasswords()
{
	
	var valid= false;
	var pass1 = document.getElementById("_txtpassword1").value;
	var pass2 = document.getElementById("_txtpassword2").value;
	
	//passwords must match
	//to-do passwords must be secure
	//to-do minlength
	
	if(pass1!=pass2)
	{
		
		      document.getElementById("_txtpassword2").setAttribute('data-content','Passwords don\'t match');
			  //to do do an ajax call to trasnlate the message
			  $('[data-toggle="_infopassword2"]').popover(); 
			  $(_txtpassword2).click();
			  
			  
			
			  
		      
	}
	else if(pass1==pass2)
	{
		   
			$('[data-toggle="_infopassword2"]').popover('hide');
		    $('[data-toggle="_infopassword2"]').popover('destroy'); 
			
	
		valid=true;
	}
	
	return valid;
	
}




//now write code to show hide the form feed back ie this is cosmetics
//coz name
function cozname(showerror)
{
	var elem = $(_txtfname).val();
	
	if(showerror==false)
	{
		if(elem!="")
		{
			//set the form feedback
			document.getElementById('_divname').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spanname').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
		}
		else if(elem=="")
		{
			//remove the from feedback
			document.getElementById('_divname').setAttribute('class','form-group has-success');
			document.getElementById('_spanname').setAttribute('class','');
	
		}
	}
	
	else if(showerror==true)
	{
		if(elem!="")
		{
			//remove the from feedback
			document.getElementById('_divname').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spanname').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
	
		}
		else if(elem=="")
		{
			
		   //remove the from feedback and place a remove icon
			document.getElementById('_divname').setAttribute('class','form-group has-error has-feedback');
			document.getElementById('_spanname').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		}
	}
	
}

//coz surname
function cozsname(showerror)
{
	var elem = $(_txtsurname).val();
	
	if(showerror==false)
	{
		if(elem!="")
		{
			//set the form feedback
			document.getElementById('_divsurname').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spansurname').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
		}
		else if(elem=="")
		{
			//remove the from feedback
			document.getElementById('_divsurname').setAttribute('class','form-group has-success');
			document.getElementById('_spansurname').setAttribute('class','');
	
		}
	}
	
	else if(showerror==true)
	{
		if(elem!="")
		{
			//remove the from feedback
			document.getElementById('_divsurname').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spansurname').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
	
		}
		else if(elem=="")
		{
			
		   //remove the from feedback and place a remove icon
			document.getElementById('_divsurname').setAttribute('class','form-group has-error has-feedback');
			document.getElementById('_spansurname').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		}
	}
	
}

//coz email
function cozemail(showerror,forceError)
{
	var elem = $(_txtemailormobile).val();
	//var element = document.getElementById(_txtemailormobile);
	if(showerror==false)
	{
		if(elem!="" && (elem.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)!=null))
		{
			//set the form feedback
			document.getElementById('_divemail').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spanemail').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
		}
		else if(elem=="" || (elem.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)==null))
		{
			//remove the from feedback
			document.getElementById('_divemail').setAttribute('class','form-group has-success');
			document.getElementById('_spanemail').setAttribute('class','');
	
		}
	}
	
	else if( (showerror==true))
	{
		if(elem!="" && (elem.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)!=null))//dont use validemail because it will show some pop ups here i only want the glyphicons
		{
			//remove the from feedback
			document.getElementById('_divemail').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spanemail').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
	
		}
		else if(elem=="" || (elem.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)==null))
		{
			
		   //remove the from feedback and place a remove icon
			document.getElementById('_divemail').setAttribute('class','form-group has-error has-feedback');
			document.getElementById('_spanemail').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		}
	}
	
	
	if(forceError==true)
	{
		    //remove the from feedback and place a remove icon
			document.getElementById('_divemail').setAttribute('class','form-group has-error has-feedback');
			document.getElementById('_spanemail').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		
	}
	
}

//coz password1
function cozpassw1(showerror)
{
	var elem = $(_txtpassword1).val();
	
	if(showerror==false)
	{
		if(elem!="")
		{
			//set the form feedback
			document.getElementById('_divpassword1').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spanpassword1').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
		}
		else if(elem=="")
		{
			//remove the from feedback
			document.getElementById('_divpassword1').setAttribute('class','form-group has-success');
			document.getElementById('_spanpassword1').setAttribute('class','');
	
		}
	}
	
	else if(showerror==true)
	{
		if(elem!="")
		{
			//remove the from feedback
			document.getElementById('_divpassword1').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spanpassword1').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
	
		}
		else if(elem=="")
		{
			
		   //remove the from feedback and place a remove icon
			document.getElementById('_divpassword1').setAttribute('class','form-group has-error has-feedback');
			document.getElementById('_spanpassword1').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		}
	}
	
}

//coz password2
function cozpassw2(showerror)
{
	//in cozz pass 2 the passwords 1 and 2 must match to pass
	
	var elem = $(_txtpassword2).val();
	var elem2 = $(_txtpassword1).val();
	
	var pass = false;
	if(elem === elem2)
	{
		pass = true;
	}
	
	
	
	if(showerror==false)
	{
		if(elem!="" && pass)
		{
			//set the form feedback
			document.getElementById('_divpassword2').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spanpassword2').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
		}
		else if(elem=="" || !pass)
		{
			//remove the from feedback
			document.getElementById('_divpassword2').setAttribute('class','form-group has-success');
			document.getElementById('_spanpassword2').setAttribute('class','');
	
		}
	}
	
	else if(showerror==true)
	{
		if(elem!="" && pass)
		{
			//remove the from feedback
			document.getElementById('_divpassword2').setAttribute('class','form-group has-success has-feedback');
			document.getElementById('_spanpassword2').setAttribute('class','glyphicon glyphicon-ok form-control-feedback');
	
		}
		else if(elem=="" || !pass)
		{
			
		   //remove the from feedback and place a remove icon
			document.getElementById('_divpassword2').setAttribute('class','form-group has-error has-feedback');
			document.getElementById('_spanpassword2').setAttribute('class','glyphicon glyphicon-remove form-control-feedback');
		}
	}
	
}

