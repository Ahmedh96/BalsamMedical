<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        //BackEnd
        Route::namespace('BackEnd')->middleware('Admin')->prefix('Balsam')->group(function(){
            //DashBord
            Route::get('dashbord' , 'DashbordController@index')->name('admin.dashbord');

            //User Controller
            Route::resource('users', 'UserController');
            Route::get('user/{status?}' , 'UserController@index')->name('user.status');
            Route::post('user/search'   , 'UserController@search')->name('user.search');

            //Roles Controller
            Route::resource('roles', 'RoleController');

            //Permission Controller
            Route::resource('permissions', 'PermissionController');

            //Contact Controller
            Route::resource('contacts', 'ContactController');

            //Comment Controller
            Route::resource('/comments','CommentController');
            Route::post('/reply/store', 'CommentController@replyStore')->name('replies.store');
            //Replay Controller
            // Route::resource('/replies','ReplayController');

            //Setting Controller
            Route::resource('settings', 'SettingController');

            //Category Controller
            Route::resource('categories'    , 'CategoryController');
            Route::get('category/{status?}' , 'CategoryController@index')->name('category.status');
            Route::post('category/search'   , 'CategoryController@search')->name('category.search');

            //Post Controller
            Route::resource('posts'    , 'PostController');
            Route::get('post/{status?}' , 'PostController@index')->name('post.status');
            Route::post('post/search'   , 'PostController@search')->name('post.search');

            //Page Controller
            Route::resource('pages'    , 'PageController');
            Route::get('page/{status?}' , 'PageController@index')->name('page.status');
            Route::post('page/search'   , 'PageController@search')->name('page.search');

        });

        //FrontEnd
        Route::middleware('Maintenance')->group(function(){

            Route::middleware('auth' , 'verified')->group(function () {
                Route::post('comments/{id}' , 'HomeController@Delete_Comment' )->name('front.deleteComment');
                Route::post('addComment' , 'HomeController@Add_Comment')->name('front.addComment');
                Route::post('replayComment' , 'HomeController@Replay_Comment')->name('front.replayComment');
            });

            Route::get('/home', 'HomeController@index')->name('home');
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('category/{id}/{name?}' , 'HomeController@CategoryPost')->name('front.category');
            Route::get('post/{id}/{name?}' , 'HomeController@Post')->name('front.post');
            Route::get('page/{id}/{name?}' , 'HomeController@Page')->name('front.page');
            Route::get('contact-us/{name?}' , 'HomeController@ContactUS')->name('front.contact');
            Route::post('contact-us' , 'HomeController@ContactSend')->name('front.contactSend');
            Route::get('WhoWeAre/{name?}' , 'HomeController@WhoWeAre')->name('front.WhoWeAre');
            Route::get('About-us/{name?}' , 'HomeController@AboutUS')->name('front.about');
            Route::post('site/search' , 'HomeController@SiteSearch')->name('front.search');
            Route::get('profile/{id}' , 'HomeController@Profile' )->name('front.profile');
            Route::post('UpdateProfile/{id}' , 'HomeController@UpdateProfile')->name('front.UpdateProfile');        });

            Auth::routes(['verify' => true]);
            Route::get('maintenance' , function(){
                if(setting()->status == 'open') {
                    return redirect()->route('home');
                }
                return view('maintenance');
            });
    }


);

