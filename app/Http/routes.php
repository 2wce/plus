<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/activate/{activation_code}', [
	'uses' => '\Chatty\Http\Controllers\AuthController@getActivate',
	'as' => 'activate',
	'middleware' => ['guest'],
]);


/**
 * Home Route
 */
Route::get('/', [
	'uses' => '\Chatty\Http\Controllers\HomeController@index',
	'as'   => 'home',

]);


Route::get('/admin', [
	'uses' => '\Chatty\Http\Controllers\AdminController@index',
	'as'   => 'admin.test',

]);



/**
 * Authentication
 */
Route::get('/signup', [
	'uses' => '\Chatty\Http\Controllers\AuthController@getSignup',
	'as'   => 'auth.signup',
	'middleware' => ['guest'],
]);

Route::post('/signup', [
	'uses' => '\Chatty\Http\Controllers\AuthController@postSignup',
	'middleware' => ['guest'],
]);



Route::get('/signin', [
	'uses' => '\Chatty\Http\Controllers\AuthController@getSignin',
	'as'   => 'auth.signin',
	'middleware' => ['guest'],
]);



Route::post('/signin', [
	'uses' => '\Chatty\Http\Controllers\AuthController@postSignin',
	'middleware' => ['guest'],
	'after'  => 'setCookie',
	//'before' => 'killCookie',

]);

Route::get('/signout', [
	'uses' => '\Chatty\Http\Controllers\AuthController@getSignout',
	'as'   => 'auth.signout',
]);



/**
 * SEARCH
 */
Route::get('/search', [
	'uses' => '\Chatty\Http\Controllers\SearchController@getResults',
	'as'   => 'search.results',
]);



/**
 * USER PROFILE
 */
// show profile
Route::get('/user/{username}', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@getProfile',
	'as'   => 'profile.index',

]);


Route::get('/user/{username}/timeline', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@getProfileTimeline',
	'as'   => 'profile.index.timeline',

]);

Route::get('/user/{username}/products', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@getProfileProducts',
	'as'   => 'profile.index.products',

]);


Route::get('/user/{username}/collections', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@getProfileCollections',
	'as'   => 'profile.index.collections',

]);

Route::get('/user/{username}/network', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@getProfileNetwork',
	'as'   => 'profile.index.network',

]);

Route::get('/category/', [
	'uses' => '\Chatty\Http\Controllers\CategoriesController@getCategory',


]);

// edit the user's profile
Route::get('/profile/edit', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@getEdit',
	'as'   => 'profile.edit',
	'middleware' => 'auth',
]);

Route::post('/profile/edit', [
	'uses' => '\Chatty\Http\Controllers\ProfileController@postEdit',
	'middleware' => 'auth',
]);

Route::post('storeToCollection', [
	'uses' => '\Chatty\Http\Controllers\CollectionsController@storeToCollection',
	'middleware' => 'auth',
]);

Route::post('shareCollection', [
	'uses' => '\Chatty\Http\Controllers\CollectionsController@shareCollection',
	'middleware' => 'auth',
]);



/**
 * FRIENDS
 */
Route::get('/friends', [
	'uses' => '\Chatty\Http\Controllers\FriendController@getIndex',
	'as'   => 'friends.index',
	'middleware' => 'auth',
]);

Route::get('/friends/add/{username}', [
	'uses' => '\Chatty\Http\Controllers\FriendController@getAdd',
	'as'   => 'friends.add',
	'middleware' => 'auth',
]);


Route::get('/endorse/add/{username}',[
	'uses'=>'\Chatty\Http\Controllers\EndorsementController@getAdd',
    'as'=>'endorse',
    'middleware' => 'auth',
    ]);

Route::get('/friends/accept/{username}', [
	'uses' => '\Chatty\Http\Controllers\FriendController@getAccept',
	'as'   => 'friends.accept',
	'middleware' => 'auth',
]);




/**
 *  STATUS  updates
 */
Route::post('/status', [
	'uses' => '\Chatty\Http\Controllers\StatusController@postStatus',
	'as'   => 'status.post',
	'middleware' => 'auth',
]);

Route::post('/status/{statusId}/reply', [
	'uses' => '\Chatty\Http\Controllers\StatusController@postReply',
	'as'   => 'status.reply',
	'middleware' => 'auth',
]);


Route::get('/status/{statusId}/like', [
	'uses' => '\Chatty\Http\Controllers\StatusController@getLike',
	'as'   => 'status.like',
	'middleware' => 'auth',
]);

Route ::resource('products', 'ProductsController') ;

Route ::resource('categories', 'CategoriesController') ;

Route ::resource('services', 'ServicesController') ;

Route ::resource('types', 'TypesController') ;

Route ::resource('collections', 'CollectionsController') ;

Route ::resource('messages', 'MessagesController') ;



//////////////////////////////////////////////////////////////////////////////////
//cookies for xmpp
Route::filter('setCookie', function() {
	//\Cookie::forever("_MYJID","jjrrj",3600);
	//session_start();
	$_SESSION["_MYJID"]=Auth::user()->username;

});
Route::get('/cookie', function(){
   session_start();
	return $_SESSION["_MYJID"];
});

//route to translate the page or chaneg the lamguage locale
Route::get('/home/lang', array('uses'=>'\Chatty\Http\Controllers\HomeController@_zish_ChangeLang',
	'as' => 'home/lang'
));


//////////////////////////////////profile/////////////////////////////////////
Route::get('/profile/{name}/contact_info',array('uses'=>'\Chatty\Http\Controllers\ProfileController@showContactInfo',
	'as'=>'profile/{name}/contact_info',
	));

Route::get('/profile/{name}/business_info',array('uses'=>'\Chatty\Http\Controllers\ProfileController@showBusinessInfo',
	'as'=>'profile/{name}/business_info',
	));

Route::get('/profile/{name}/community_info',array('uses'=>'\Chatty\Http\Controllers\ProfileController@showCommunityInfo',
	'as'=>'profile/{name}/community_info',
	));

Route::get('/profile/{name}/academic_info',array('uses'=>'\Chatty\Http\Controllers\ProfileController@showAcademicInfo',
	'as'=>'profile/{name}/academic_info',
	));
Route::get('/profile/{name}/general_settings',array('uses'=>'\Chatty\Http\Controllers\ProfileController@showGeneralSettings',
	'as'=>'profile/{name}/general_settings',
	));

Route::get('/profile/{name}/location_info',array('uses'=>'\Chatty\Http\Controllers\ProfileController@showLocationInfo',
	'as'=>'profile/{name}/location_info',
	));

Route::get('/profile/{name}/proffesional_info',array('uses'=>'\Chatty\Http\Controllers\ProfileController@showProfessionalInfo',
	'as'=>'profile/{name}/proffesional_info',
	));


////////////////////////////////////endorsement ///////////////////////////////
Route::get('/endorse/{user_id}',array('uses'=>'\Chatty\Http\Controllers\EndorsementController@getAdd',
	'as'=>'endorse',
	));


///get friends to add to group////
Route::get('/groups',array('uses'=>'\Chatty\Http\Controllers\GroupController@getFriends',
	'as'=>'groups',
	));
