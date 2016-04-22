// JavaScript Document

//xmpp.js code to send and recieve messages using xmpp

//auther kudzai zishumba

//date 3/2/2016



// change it to fit the env

var BOSH_SERVICE = 'http://162.243.243.116:7070/http-bind/';


var connection = null;

function log(msg) 
{
   // $('#log').append('<div></div>').append(document.createTextNode(msg));
   console.log(msg);
}

function rawInput(data)
{
    console.log('RECV: ' + data);
}

function rawOutput(data)
{
    console.log('SENT: ' + data);
}

function onConnect(status)
{
    if (status == Strophe.Status.CONNECTING) {
  log('Strophe is connecting.');
    } else if (status == Strophe.Status.CONNFAIL) {
	log('Strophe failed to connect.');
	//$('#connect').get(0).value = 'connect';
    } else if (status == Strophe.Status.DISCONNECTING) {
	log('Strophe is disconnecting.');
    } else if (status == Strophe.Status.DISCONNECTED) {
	log('Strophe is disconnected.');
	//$('#connect').get(0).value = 'connect';
    } else if (status == Strophe.Status.CONNECTED || status === Strophe.Status.ATTACHED) {
	log('Strophe is connected.');
	//connection.disconnect();
	log('ECHOBOT: Send a message to ' + connection.jid + 
	    ' to talk to me.');
	
	//connection.addHandler(onMessage, null, 'message', 'chat');
	
	connection.addHandler(onMessage, null,    'message', null, null,  null); 
	//connection.addHandler(onOwnMessage, null, 'iq', 'set', null,  null); 
	connection.send($pres().tree());
    }
}



function onMessage(msg) {
	

	  console.log("----------------------recevie message----------------------");

	//console.log("----------------------recevie  message----------------------");
	//console.log(msg);
	//console.log("----------------------recevie message----------------------");
   

    var to = msg.getAttribute('to');
    var from = msg.getAttribute('from');
    var type = msg.getAttribute('type');
    var elems = msg.getElementsByTagName('body');

   
 

    if (type == "chat" && elems.length > 0) {
		
  		var body = elems[0];
		//alert(Strophe.getText(body));
		//set the message recieved in the correct chat box
		var _id_ = from.replace("@ubuntu-512mb-plusafrik/Spark","");

		var _msg_= Strophe.getText(body);
  	    addRecievedMessage(_id_,_msg_);//method defined in chat.js
    }

    // we must return true to keep the handler alive.  
    // returning false would remove it after it finishes.
    return true;
}


function sendMessage() {
    var message = $('#message').get(0).value;
    var to = $('#to').get(0).value;
    if(message && to){
		var reply = $msg({
		    to: to,
		    type: 'chat'
		})
		.cnode(Strophe.xmlElement('body', message)).up();
		//.c('active', {xmlns: "http://jabber.org/protocol/httpbind"});
		
		connection.send(reply);
		
		console.log('I sent ' + to + ': ' + message);
		
		//var reply = $msg({to: toId, from:fromId , type: 'chat'}).cnode(Strophe.xmlElement('body', '' ,msg));
		//connection.send(reply.tree());
    }
}


$(document).ready(function () {
    
	var _MYPASS = '12345';
	var _MYJID  = 'zish';
 
    //_MYJID = getCookie("_MYJID") + "@zish-pc";

	$.get( "cookie", function( data ) {
	 
	    _MYJID = data + "@ubuntu-512mb-plusafrik/Spark";
	  
		connection = new Strophe.Connection(BOSH_SERVICE);
		connection.rawInput = rawInput;
		connection.rawOutput = rawOutput;
		//connect to the xmpp server
		connection.connect(_MYJID,_MYPASS , onConnect);

		Strophe.log = function (level, msg) { console.log('[log] ['+level+']' + msg); };

	}).done(function() {
   // alert( "second success" );
  })
  .fail(function() {
  })
  .always(function() {
   // alert( "finished" );
  });

   
	

	
    
    

});



function _sendMessage(_to,_msg) {
	
    var message = _msg;

    var to      = _to+"@ubuntu-512mb-plusafrik/Spark";//this is the xmpp jid

	
    if(message && to){
		var reply = $msg({
		    to: to,
		    type: 'chat'
		})
		.cnode(Strophe.xmlElement('body', message)).up();
		//.c('active', {xmlns: "http://jabber.org/protocol/httpbind"});
		
		connection.send(reply);//this connection is already authenticated
		
		console.log('I sent ' + to + ': ' + message);
		
		//var reply = $msg({to: toId, from:fromId , type: 'chat'}).cnode(Strophe.xmlElement('body', '' ,msg));
		//connection.send(reply.tree());
    }
}//_sendMessage


//fuction to check for a connection and poll to reconnect if connection drops
function PollConnection(status)
{
	var _MYPASS = '12345';

	var _MYJID  = 'kudzai@ubuntu-512mb-plusafrik/Spark';

	if (status != Strophe.Status.CONNECTED || status != Strophe.Status.ATTACHED)
	connection.connect(_MYJID, _MYPASS, null);
	//alert(Strophe.Status.CONNECTED);
}
 //setTimeout(PollConnection,1000);
//setInterval(PollConnection,1000);

function setCookie(cname) {
   

document.cookie = "_MYJID="+cname+"; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";

}

//setCookie('fee');
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

