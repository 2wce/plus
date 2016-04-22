//javascript code to hadle the on screen chat


//auther kudzai zishumba


//date 3/2/2016












			//this function can remove a array element.
			Array.remove = function(array, from, to) {
  				var rest = array.slice((to || from) + 1 || array.length);
  				array.length = from < 0 ? array.length + from : from;
  				return array.push.apply(array, rest);
			};
		
			//this variable represents the total number of popups can be displayed according to the viewport width
			var total_popups = 0;
			
			//arrays of popups ids
			var popups = [];
		
			//this is used to close a popup
			function close_popup(id)
			{
				for(var iii = 0; iii < popups.length; iii++)
				{
					if(id == popups[iii])
					{
						Array.remove(popups, iii);
						
						document.getElementById(id).style.display = "none";
						
						calculate_popups();
						
						return;
					}
				}	
			}
		
			//displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
			function display_popups()
			{
				var right = 220;
				
				var iii = 0;
				for(iii; iii < total_popups; iii++)
				{
					if(popups[iii] != undefined)
					{
						var element = document.getElementById(popups[iii]);
						element.style.right = right + "px";
						right = right + 320;
						element.style.display = "block";
					}
				}
				
				for(var jjj = iii; jjj < popups.length; jjj++)
				{
					var element = document.getElementById(popups[jjj]);
					element.style.display = "none";
				}
			}
			
			//creates markup for a new popup. Adds the id to popups array.
			function register_popup(id, name)
			{
				
				for(var iii = 0; iii < popups.length; iii++)
				{	
					//already registered. Bring it to front.
					if(id == popups[iii])
					{
						Array.remove(popups, iii);
					
						popups.unshift(id);
						
						calculate_popups();
						
						
						return;
					}
				}				
				
				
				 
				
				var element =           '<div class="popup-box chat-popup" id="'+ id +'">';
					element = element + '<div class="popup-head">';
					element = element + '<div class="popup-head-left">'+ name +'</div>';
					element = element + '<div class="popup-head-right"><a href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
					element = element + '<div style="clear: both"></div></div><!--popup-head-->';
					element = element + '<div class="popup-messages" id='+id+"_scroll"+'>';
					element = element + '<div class="_chatarea" id='+id+"chatarea"+'></div><!--chat area-->';
					
					element = element + '<div class="_typingaerea">';
					
//element = element + '<div class="row">';
//element = element + '<div class="col-md-8">';	
element = element + '<div class="" style="width:70%;margin:0px;float:left;">';			
element = element + '<div class="form-group">';
//element = element + '<input id='+id+"txtmsg"+' type="text" class="form-control" placeholder="type your message">';
element = element + '<textarea id='+id+"txtmsg"+' rows="1" class="form-control" onKeyPress="enterpressalert(event,this.id);"></textarea>';
element = element + '</div><!--form-group-->';
element = element + '</div><!--width 80%-->';
//element = element + '</div><!--col-md-8-->';
//element = element + '<div class="col-md-2">';

element = element + '<div class="" style="width:20%;margin:0px;float:left;">';			
element = element + '<button id='+id+' type="submit" onclick="addMessage(this.id);  return false;" class="btn btn-primary">Send <img src="dist/chat/img.chat/send.png" height="15" style="margin-top:-2px;" width="20"/></button>';
element = element + '</div><!--width 20%-->';
//element = element + '</div><!--col-md-2-->';
//element = element + '</div><!--row-->';

					element = element + '</div><!--typing area-->';
					element = element + '</div><!--popup-messages--></div><!--popup-box chat-popup-->';
					
					
				
				
				document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;	
		
				popups.unshift(id);
						
				calculate_popups();
				
			}
			
			//calculate the total number of popups suitable and then populate the toatal_popups variable.
			function calculate_popups()
			{
				var width = window.innerWidth;
				if(width < 540)
				{
					total_popups = 0;
				}
				else
				{
					width = width - 200;
					//320 is width of a single popup box
					total_popups = parseInt(width/320);
				}
				
				display_popups();
				
			}
			
			//recalculate when window is loaded and also when window is resized.
			window.addEventListener("resize", calculate_popups);
			window.addEventListener("load", calculate_popups);
			
		
		
		

 			//function to send a message on click or on press enter
			
			//when the user clicks send button
			function addMessage(id)
			{
				var txt_message   = id + "txtmsg";    //grab the correct text box
				var msg_box       = id + "msgbox";    //grab the correct msgbox
				var chat_area     = id + "chatarea";  //grab the correct chat area
				var the_message   = document.getElementById(txt_message).value;//grab the actual messge 
				
				var time = _getTime();
				var Chat_Element = '<div class="_mychatBox">';
				    Chat_Element = Chat_Element + '<img src="dist/chat/img.chat/user.png" class="_mychatImage" />';
 					Chat_Element = Chat_Element +  the_message;
					Chat_Element = Chat_Element + '<div class="chattime">';
					Chat_Element = Chat_Element + '<img src="dist/chat/img.chat/clock.png" height="20" width="20" />';
					Chat_Element = Chat_Element + time;
				    Chat_Element = Chat_Element + '</div><!--chattime-->';
					Chat_Element = Chat_Element + '</div>';
					
			    if(the_message!=''){
					document.getElementById(chat_area).innerHTML = document.getElementById(chat_area).innerHTML + Chat_Element;
					_sendMessage(id,the_message);//method defined in xmpp.js
					document.getElementById(txt_message).value ='';
				}
				
				var objDiv = document.getElementById(id+"_scroll");
				objDiv.scrollTop = objDiv.scrollHeight;
				document.getElementById(txt_message).focus();
				//alert(objDiv.innerHTML);
				
				
			}
			
			
			
			//when the user recieves a message send button
			function addRecievedMessage(id_,msg)
			{
				

				try
				{
				var id = id_;//;.substring(0,id_.indexOf('/'));//remove this junk

				

				
				var chat_area     = id + "chatarea";  //grab the correct chat area
				var time = _getTime();
				var Chat_Element = '<div class="_yourchatBox">';
				    Chat_Element = Chat_Element + '<img src="dist/chat/img.chat/user.png" class="_yourchatImage" />';
 					Chat_Element = Chat_Element +  msg;
					Chat_Element = Chat_Element + '<div class="chattime">';
					Chat_Element = Chat_Element + '<img src="dist/chat/img.chat/clock.png" height="20" width="20" />';
					Chat_Element = Chat_Element + time;
				    Chat_Element = Chat_Element + '</div><!--chattime-->';
					Chat_Element = Chat_Element + '</div>';
					
			    if(msg!='')
				{
					document.getElementById(chat_area).innerHTML = document.getElementById(chat_area).innerHTML + Chat_Element;
				}
			
				
				
			    var objDiv = document.getElementById(id+"_scroll");
				objDiv.scrollTop = objDiv.scrollHeight+10;
				//document.getElementById(txt_message).focus();
				//alert(objDiv.innerHTML);	
				
				}catch(e)
				{
					alert("line 237 chat.js "+ e);
				}

			}
			
				//function to check if the enter key is pressed
             function enterpressalert(e,id)
			 {
				 var _id = id.replace("txtmsg","");
					var code = (e.keyCode ? e.keyCode : e.which);
					if(code == 13) { //Enter keycode
					 //addMessage(_id);
					 
					}
			 }
			 
			 function _getTime()
			 {
				 var time = null;
				 var d = new Date(); 
				time = time +  d.getHours(); // => 9
				time = time + ":" + d.getMinutes(); // =>  30
				time = time + ":" + d.getSeconds(); // => 51
				return time;
			 }