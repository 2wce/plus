<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Plus | Afrik</title>

<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />


<link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap-theme.css') }}">
<link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap-theme.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/css/loginHome.css') }}">

</head>

<body>
<div class='_topbar1'>
<div class="row" style="background-color:#3CF;">
<div style="margin-top:20px;">
<div class="col-md-3"><img src="img/logo.gif" /></div>
<div class="col-md-7"><!--col-md-4-->
   <form class="form-inline"><!--login form-->
                        <div id='_div_login_email' class="form-group has-success has-feedback">
                        <!--<label for="exampleInputName2">Name</label>-->
                        <input type="text" class="form-control" id="txt_email_login" placeholder=" {{ trans('home_page.email_or_mobile1') }} " />
                        <span id='_span_login_email' class=""></span>
                        </div>
                        <div class="form-group has-success has-feedback" id='div_login_pass'>
                        <!--<label for="exampleInputEmail2">Email</label>-->
                        <input  type="password" class="form-control" id="txt_pass_login" placeholder=" {{ trans('home_page.password1') }} ">
                        <span id='_span_login_pass' class=""></span>
                        </div>
                        <button id='btnlogin' type="button" class="btn btn-info"> {{ trans('home_page.login') }}</button><br />
                </form><!--form - inline end login form-->
                <label id='lblinfo' style="color:#F00;"></label>  
</div><!--col-md-4-->
</div><!--style-->


<div class="col-md-1">


<div class="row">
  <div class="col-xs-6"><img style="margin-top:3px;" height="30" width="50" src="img/flags/en.png" id="_currentFlag" /></div>
  <div class="col-xs-6">
  <form class="form-inline">
<select class="form-control" id="langslector" onchange="changeLang(this.value); setCookieLang(this.value); return false;">
<option value="en"  selected="selected">english</option>
<option value="fr">français</option>
<option value="de">deutsche</option>
<option value="ru">русский</option>
<option value="po">português</option>
<option value="es">espagnol</option>
</select>
</form>

  
  
  </div><!--col-->
</div><!--row-->


</div><!--col-md-1-->

<!--
</div>row-->
<!--
</div>div topbar-->

           

  
  






<div class="_welcomebar">
<center>
<h2>{{ trans('home_page.welcome_text1') }}<br> {{ trans('home_page.welcome_text12') }}</h2>

 <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="img/red.jpg" />
                <div style="position: absolute; top: 30px; left: 30px; width: 480px; height: 120px; font-size: 50px; color: #ffffff; line-height: 60px;">Buy , Bid , Sell</div>
                <div style="position: absolute; top: 300px; left: 30px; width: 480px; height: 120px; font-size: 30px; color: #ffffff; line-height: 38px;">Sell your product online with Plus Afrik, Promote your business with anything, includes image, content, text, html, photo, picture</div>
                <div data-u="caption" data-t="0" style="position: absolute; top: 100px; left: 600px; width: 445px; height: 300px;">
                    <img src="img/c-phone.png" style="position: absolute; top: 0px; left: 0px; width: 445px; height: 300px;" />
                    <img src="img/c-jssor-slider.png" data-u="caption" data-t="1" style="position: absolute; top: 70px; left: 130px; width: 102px; height: 78px;" />
                    <img src="img/c-text.png" data-u="caption" data-t="2" style="position: absolute; top: 153px; left: 163px; width: 80px; height: 53px;" />
                    <img src="img/c-fruit.png" data-u="caption" data-t="3" style="position: absolute; top: 60px; left: 220px; width: 140px; height: 90px;" />
                    <img src="img/c-navigator.png" data-u="caption" data-t="4" style="position: absolute; top: -123px; left: 121px; width: 200px; height: 155px;" />
                </div>
                <div data-u="caption" data-t="5" style="position: absolute; top: 120px; left: 650px; width: 470px; height: 220px;">
                    <img src="img/c-phone-horizontal.png" style="position: absolute; top: 0px; left: 0px; width: 470px; height: 220px;" />
                    <div style="position: absolute; top: 4px; left: 45px; width: 379px; height: 213px; overflow: hidden;">
                        <img src="img/c-slide-1.jpg" data-u="caption" data-t="6" style="position: absolute; top: 0px; left: 0px; width: 379px; height: 213px;" />
                        <img src="img/c-slide-3.jpg" data-u="caption" data-t="7" style="position: absolute; top: 0px; left: 379px; width: 379px; height: 213px;" />
                    </div>
                    <img src="img/c-navigator-horizontal.png" style="position: absolute; top: 4px; left: 45px; width: 379px; height: 213px;" />
                    <img src="img/c-finger-pointing.png" data-u="caption" data-t="8" style="position: absolute; top: 740px; left: 1600px; width: 257px; height: 300px;" />
                </div>
            </div>
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="img/purple.jpg" />
            </div>
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="img/blue.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
    </div>

    <!-- #endregion Jssor Slider End -->
















<h3>{{ trans('home_page.get_connected1') }}</h3>
</div><!-- div _welcomebar-->




<div class="_getconnectedbar">
<br />
<br />
<center>
<form class="form-inline"  id='signupform' >


<div id='_divname' class="form-group has-success has-feedback">
<input onchange="cozname(false);" type="text" class="form-control" id="_txtfname"  data-toggle="_infoname" title=" {{ trans('home_page.information') }} " data-content=" {{ trans('home_page.please_enter_your_name') }} " data-placement="top" placeholder="{{ trans('home_page.first_name') }}" />
<span id='_spanname' class=""></span>
</div>
 
<div id='_divsurname' class="form-group has-success has-feedback">
<input onchange="cozsname(false);" data-placement="top" type="text" class="form-control" id="_txtsurname" placeholder="{{ trans('home_page.surname') }}" data-toggle="_infosname" title=" {{ trans('home_page.information') }} " data-content=" {{ trans('home_page.please_enter_your_surname') }} ">
<span id='_spansurname' class=""></span>
</div>

<div id='_divemail' class="form-group has-success has-feedback">
<input onchange="cozemail(true);" data-placement="top" type="email" class="form-control" id="_txtemailormobile" placeholder="{{ trans('home_page.email_or_mobile2') }}" data-toggle="_infomobileoremail" title=" {{ trans('home_page.information') }} " data-content=" {{ trans('home_page.invalid_email') }} " />
<span id='_spanemail' class=""></span>
</div>

<div id='_divpassword1' class="form-group has-success has-feedback">
<input onchange="cozpassw1(true);" data-placement="top" type="password" class="form-control" id="_txtpassword1" placeholder="{{ trans('home_page.password2') }}" data-toggle="_infopassword1" title=" {{ trans('home_page.information') }} " data-content=" {{ trans('home_page.please_enter_your_password') }} " />
<span id='_spanpassword1' class=""></span>
</div>
  
<div id="_divpassword2" class="form-group has-success has-feedback">
<input onchange="cozpassw2(true);" data-placement="top" type="password" class="form-control" id="_txtpassword2" placeholder="{{ trans('home_page.confirm_password') }}" data-toggle="_infopassword2" title=" {{ trans('home_page.information') }} " data-content="  {{ trans('home_page.please_confirm_your_password') }} "/>
<span id='_spanpassword2' class=""></span>
</div>
  
</form>

<form class="form-inline" style="margin-top:9px; margin-left:0%;">
<div class="form-group">
<button type="submit" class="btn btn-primary" id="_btnsignup" onclick="return false;">{{ trans('home_page.btn_connect') }}</button>
</div>
</form>
<br />
<br />
</center>
</div><!-- div _getconnectedbar-->

</div><!--important div-->



<div class="_titlebar">
<center>
<h1>{{ trans('home_page.welcome_text2') }} <br />{{ trans('home_page.welcome_text21') }}</h1> 
<h4>{{ trans('home_page.watch_video') }}</h4>
</div><!-- div _titlebar-->


<div class="_videobar">
<center>
<iframe class="_iframevideo"
src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0">
</iframe>

</div><!-- div _videobar-->


<div class="_connectbar">
<center>
<img src="img/connect100_100.png" class="_imgconnect" id='imggetconnected'/>
<h2>{{ trans('home_page.get_connected2') }}</h2>
</div><!-- div _connectbar-->

<div class="_footer">
<center>
<br />
<h2>{{ trans('home_page.get_in_touch') }}</h2>
<form class="form-inline">
  
<div id='div_email_name' class="form-group has-success has-feedback">
<input type="text" class="form-control" id="txt_email_name" placeholder=" {{ trans('home_page.your_name') }} ">
<span id='span_email_name' class=""></span>
</div>

<div id='div_email_company' class="form-group has-success has-feedback">
<input type="email" class="form-control" id="txt_email_company" placeholder="  {{ trans('home_page.your_company') }} ">
<span id='span_email_company' class=""></span>
</div>

<div id='div_email_email' class="form-group has-success has-feedback">
<input onchange="validEmail_email(this.value);" type="email" class="form-control" id="txt_email_email" placeholder="{{ trans('home_page.your_email') }}" data-toggle="_email_email" title=" {{ trans('home_page.information') }} " data-content="invalid email" data-placement="top">
<span id='span_email_email' class=""></span>
</div>
 
</form>
</center>
<br />

<form id='' class="form-inline">
<center>
<div id='div_email_message' class="form-group has-success has-feedback">
<textarea  class="form-control" id="txt_email_message" rows="5" cols="88" placeholder=" {{ trans('home_page.your_message') }}">
</textarea>
<span id='span_email_message' class=""></span>
</div>
</center>
</form>

 <br />
 <center>
 <button type="submit" class="btn btn-primary" style="width:150px;" id='btn_email_send'>    {{ trans('home_page.btn_send') }}    </button>
 </center>
 <br />
</div><!-- div _footer-->


<div class="_footnote">

<div class="_copyright">
&nbsp;&nbsp;{{ trans('home_page.copy_right') }}
</div><!--copy right-->



<div id="navcontainer">
<ul>
<li><a href="#">{{ trans('home_page.contact_us') }}</a></li>
<li><a href="#">{{ trans('home_page.terms_conditions') }}</a></li>
<li><a href="#">{{ trans('home_page.privacy_policy') }}</a></li>
<li><a href="#">{{ trans('home_page.help') }}</a></li>
</ul>
</div><!-- div navcontainer-->

</div><!-- _footnote -->


</body>
</html>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/_change_language.js"></script><!-- this file is first to be included in the top-->
<script src="js/_sign_up.js"></script>
<script src="js/_login.js"></script>
<script src="js/_sendEmail.js"></script>
<script src="js/jssor.slider.mini.js"></script>
<script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideoTransitions = [
              [{b:5500,d:3000,o:-1,r:240,e:{r:2}}],
              [{b:-1,d:1,o:-1,c:{x:51.0,t:-51.0}},{b:0,d:1000,o:1,c:{x:-51.0,t:51.0},e:{o:7,c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1,sX:9,sY:9},{b:1000,d:1000,o:1,sX:-9,sY:-9,e:{sX:2,sY:2}}],
              [{b:-1,d:1,o:-1,r:-180,sX:9,sY:9},{b:2000,d:1000,o:1,r:180,sX:-9,sY:-9,e:{r:2,sX:2,sY:2}}],
              [{b:-1,d:1,o:-1},{b:3000,d:2000,y:180,o:1,e:{y:16}}],
              [{b:-1,d:1,o:-1,r:-150},{b:7500,d:1600,o:1,r:150,e:{r:3}}],
              [{b:10000,d:2000,x:-379,e:{x:7}}],
              [{b:10000,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:9100,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:10000,d:1600,x:-200,o:-1,e:{x:16}}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
    </style>

 