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

Route::get('/posts', [
	'uses' => '\Chatty\Http\Controllers\UI\HomeController@posts',
	'as'   => 'posts',

]);

Route::get('/prodcts', [
	'uses' => '\Chatty\Http\Controllers\UI\HomeController@prodcts',
	'as'   => 'prodcts',

]);

Route::get('/service', [
	'uses' => '\Chatty\Http\Controllers\UI\HomeController@service',
	'as'   => 'service',

]);


Route::get('/select-cat', [
	'uses' => '\Chatty\Http\Controllers\UI\HomeController@selectCat',
	'as'   => 'cats',

]);

Route::get('/timeline/{cat_id}', [
	'uses' => '\Chatty\Http\Controllers\HomeController@getTimelineFilter',
	'as'   => 'timeline.show',

]);

//@TODO figure out why this won't cache
Route::post('storeToCollection', [
	'uses' => '\Chatty\Http\Controllers\DbModels\CollectionsController@storeToCollection',
	'middleware' => ['auth'],
]);

Route::post('addUserCategories', [
	'uses' => '\Chatty\Http\Controllers\Auth\AuthController@postCategorySelect',

]);

Route::post('follows/{username}',[
  'uses' => '\Chatty\Http\Controllers\Relationships\FollowsController@store',
  'as' => 'follow'
  ]);

Route::post('follows/{id}',[
    'uses' => '\Chatty\Http\Controllers\Relationships\FollowsController@destroy',
    'as' => 'unfollow'
]);

// Route to create a new role
Route::post('role', '\Chatty\Http\Controllers\Auth\JwtAuthenticateController@createRole');
// Route to create a new permission
Route::post('permission', '\Chatty\Http\Controllers\Auth\JwtAuthenticateController@createPermission');
// Route to assign role to user
Route::post('assign-role', '\Chatty\Http\Controllers\Auth\JwtAuthenticateController@assignRole');
// Route to attache permission to a role
Route::post('attach-permission', '\Chatty\Http\Controllers\Auth\JwtAuthenticateController@attachPermission');

// API route group that we need to protect
Route::group(['prefix' => 'api', 'middleware' => ['ability:admin,create-users']], function()
{
    // Protected route
    Route::get('users', '\Chatty\Http\Controllers\Auth\JwtAuthenticateController@index');
});

// Authentication route
Route::post('authenticate', '\Chatty\Http\Controllers\Auth\JwtAuthenticateController@authenticate');

Route::get('/activate/{activation_code}', [
	'uses' => '\Chatty\Http\Controllers\Auth\AuthController@getActivate',
	'as' => 'activate',
	'middleware' => ['guest'],
]);


/**
 * Home Route
 */

Route::get('/', [
	'uses' => '\Chatty\Http\Controllers\UI\HomeController@landing',
	'as'   => 'landing',
	'middleware' => ['guest'],

]);

Route::get('/', [
	'uses' => '\Chatty\Http\Controllers\UI\HomeController@index',
	'as'   => 'home',

]);


Route::get('/admin', [
	'uses' => '\Chatty\Http\Controllers\Auth\AdminController@index',
	'as'   => 'admin.test',

]);



/**
 * Authentication
 */
Route::get('/signup', [
	'uses' => '\Chatty\Http\Controllers\Auth\AuthController@getSignup',
	'as'   => 'auth.signup',
	'middleware' => ['guest'],
]);

Route::post('/signup', [
	'uses' => '\Chatty\Http\Controllers\Auth\AuthController@postSignup',
	'middleware' => ['guest'],
]);



Route::get('/signin', [
	'uses' => '\Chatty\Http\Controllers\Auth\AuthController@getSignin',
	'as'   => 'auth.signin',
	'middleware' => ['guest'],
]);



Route::post('/signin', [
	'uses' => '\Chatty\Http\Controllers\Auth\AuthController@postSignin',
	'middleware' => ['guest'],
	'after'  => 'setCookie',
	//'before' => 'killCookie',

]);

Route::get('/signout', [
	'uses' => '\Chatty\Http\Controllers\Auth\AuthController@getSignout',
	'as'   => 'auth.signout',
]);



/**
 * SEARCH
 */
Route::get('/search', [
	'uses' => '\Chatty\Http\Controllers\UI\SearchController@getResults',
	'as'   => 'search.results',
]);



/**
 * USER PROFILE
 */
// show profile
Route::get('/user/{username}', [
	'uses' => '\Chatty\Http\Controllers\UI\ProfileController@getProfile',
	'as'   => 'profile.index',

]);


Route::get('/user/{username}/timeline', [
	'uses' => '\Chatty\Http\Controllers\UI\ProfileController@getProfileTimeline',
	'as'   => 'profile.index.timeline',

]);

Route::get('/user/{username}/products', [
	'uses' => '\Chatty\Http\Controllers\UI\ProfileController@getProfileProducts',
	'as'   => 'profile.index.products',

]);


Route::get('/user/{username}/collections', [
	'uses' => '\Chatty\Http\Controllers\UI\ProfileController@getProfileCollections',
	'as'   => 'profile.index.collections',

]);

Route::get('/user/{username}/network', [
	'uses' => '\Chatty\Http\Controllers\UI\ProfileController@getProfileNetwork',
	'as'   => 'profile.index.network',

]);

Route::get('/category/', [
	'uses' => '\Chatty\Http\Controllers\DbModels\CategoriesController@getCategory',


]);

// edit the user's profile
Route::get('/profile/edit', [
	'uses' => '\Chatty\Http\Controllers\UI\ProfileController@getEdit',
	'as'   => 'profile.edit',
	'middleware' => 'auth',
]);

Route::post('/profile/edit', [
	'uses' => '\Chatty\Http\Controllers\UI\ProfileController@postEdit',
	'middleware' => 'auth',
]);

Route::post('storeToCollection', [
	'uses' => '\Chatty\Http\Controllers\UI\CollectionsController@storeToCollection',
	'middleware' => 'auth',
]);

Route::post('shareCollection', [
	'uses' => '\Chatty\Http\Controllers\UI\CollectionsController@shareCollection',
	'middleware' => 'auth',
]);



/**
 * FRIENDS
 */
Route::get('/friends', [
	'uses' => '\Chatty\Http\Controllers\Relationships\FriendController@getIndex',
	'as'   => 'friends.index',
	'middleware' => 'auth',
]);

Route::get('/friends/add/{username}', [
	'uses' => '\Chatty\Http\Controllers\Relationships\FriendController@getAdd',
	'as'   => 'friends.add',
	'middleware' => 'auth',
]);


Route::get('/endorse/add/{username}',[
	'uses'=>'\Chatty\Http\Controllers\Relationships\EndorsementController@getAdd',
    'as'=>'endorse',
    'middleware' => 'auth',
    ]);

Route::get('/friends/accept/{username}', [
	'uses' => '\Chatty\Http\Controllers\Relationships\FriendController@getAccept',
	'as'   => 'friends.accept',
	'middleware' => 'auth',
]);




/**
 *  STATUS  updates
 */
Route::post('/status', [
	'uses' => '\Chatty\Http\Controllers\DbModels\StatusController@postStatus',
	'as'   => 'status.post',
	'middleware' => 'auth',
]);

Route::post('/status/{statusId}/reply', [
	'uses' => '\Chatty\Http\Controllers\DbModels\StatusController@postReply',
	'as'   => 'status.reply',
	'middleware' => 'auth',
]);


Route::get('/status/{statusId}/like', [
	'uses' => '\Chatty\Http\Controllers\DbModels\StatusController@getLike',
	'as'   => 'status.like',
	'middleware' => 'auth',
]);

Route ::resource('products', '\Chatty\Http\Controllers\DbModels\ProductsController') ;

Route ::resource('categories', '\Chatty\Http\Controllers\DbModels\CategoriesController') ;

Route ::resource('services', '\Chatty\Http\Controllers\DbModels\ServicesController') ;

Route ::resource('types', '\Chatty\Http\Controllers\DbModels\TypesController') ;

Route ::resource('collections', '\Chatty\Http\Controllers\DbModels\CollectionsController') ;

Route ::resource('messages', '\Chatty\Http\Controllers\Chat\MessagesController') ;


////////////////////////////////////endorsement ///////////////////////////////
Route::get('/endorse/{user_id}',array('uses'=>'\Chatty\Http\Controllers\Relationships\EndorsementController@getAdd',
	'as'=>'endorse',
	));


///get friends to add to group////
Route::get('/groups',array('uses'=>'\Chatty\Http\Controllers\Relationships\GroupController@getFriends',
	'as'=>'groups',
	));
