//code to change the language settings on the home page

//change home page language settings 

//change cooky values to hold languge settings

//auto detect locale and set language values

/*
 * auther kudzai zishumba
 * date 2-12-2016
 */
 
 
//use raw javascript because it is the first file to load we want it to load before the jquery for speed


 
 
//function to check the value of the cookie and set or get
function getLang()
{
	try
	{
			var curlang = getCurrentLang();
			if(curlang=='')
			{
				//no lang set
				//set the defaults
			}
			else if(curlang!='')
			{
				//fire to the server the value of the current cookie language
				var xhrlang = new XMLHttpRequest();
				xhrlang.open("get","home/lang?lang="+curlang,false);
			    xhrlang.send();
				//set the correct flag and correct value
				document.getElementById("_currentFlag").src='img/flags/'+curlang+'.png';//set the flag
				document.getElementById('langslector').value = curlang;//set the value
				
			}
			
		}catch(e)
		{
			alert("line 44 _change_language.js " + e);
		}
}
getLang();//this method is fired each time the page loads and the file must be first to be included in the html
 
//function to set the language cookie
function setCookieLang(val)
{
	try
	{
		document.cookie="plusafriklang="+val; //set the cookie
		var xhrlang = new XMLHttpRequest();
		xhrlang.open("get","home/lang?lang="+val,false);
		xhrlang.send();
		if(xhrlang.readyState==4&&xhrlang.status==200)
		{
			window.location="";//reload the page
		}else if(xhrlang.readyState==4&&xhrlang.status>200)
		{
			alert('error');
		}

	}catch(e)
	{
		 alert("line 62 _change_language.js " + e);
	}
	
}

 
 
 //function to read the current language cookie
function getCurrentLang() 
{
    var name = 'plusafriklang' + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

//function to change the flags to correspond to the language
function changeLang(lang)
{
	try
	{
	//first change the flag
	var _currentFlag = document.getElementById("_currentFlag");
	var langselection = lang;
	
	if(langselection=="en")
	{
		_currentFlag.src="img/flags/en.png";
	}
	else if(langselection=="fr")
	{
		_currentFlag.src="img/flags/fr.png";
	}
	else if(langselection=="de")
	{
		_currentFlag.src="img/flags/de.png";
	}
	else if(langselection=="ru")
	{
		_currentFlag.src="img/flags/ru.png";
	}
	else if(langselection=="es")
	{
		_currentFlag.src="img/flags/es.png";
	}	
	else if(langselection=="po")
	{
		_currentFlag.src="img/flags/po.png";
	}
	
	}catch(e)
	{
		 alert("line 138 _change_language.js " + e);
	}
	
}

