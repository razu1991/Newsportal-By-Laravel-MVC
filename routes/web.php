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

//Route::get('/', function () {
//    return view('pages.index');
//});
###NewsPortal FrontPage/IndexPage......................................
Route::get('/','FrontController@index');
Route::get('headcategory','FrontController@headcategory');
Route::get('contact','FrontController@contact');
Route::get('single-page/{id}','FrontController@singlepage');
Route::get('single-category/{id}','FrontController@singlecategory');
Route::get('category-archive/{id}','FrontController@categoryarchive');
Route::get('single-tag/{id}','FrontController@singletag');
Route::post('/save-comment', 'FrontController@saveComment');

### Start Admin Controller---------------------------------------------------------
Route::get('/razu', 'AdminController@index');
Route::post('/admin-login', 'AdminController@admin_login_check');


#work with SuperAdminController start here----------------------------------------- 
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/add-category', 'SuperAdminController@addCategory');
Route::post('/save-category', 'SuperAdminController@saveCategory');
Route::get('/manage-category', 'SuperAdminController@manageCategory');
Route::get('/add-tag', 'SuperAdminController@addTag');
Route::post('/save-tag', 'SuperAdminController@saveTag');
Route::get('/manage-tag', 'SuperAdminController@manageTag');
Route::get('/delete-tag/{id}', 'SuperAdminController@deleteTag');
Route::get('/edit-tag/{id}', 'SuperAdminController@editTag');
Route::post('/update-tag', 'SuperAdminController@updateTag');
###########################################################################
Route::get('/unpublish-category/{id}', 'SuperAdminController@unpublishCategory');
Route::get('/publish-category/{id}', 'SuperAdminController@publishCategory');
Route::get('/edit-category/{id}', 'SuperAdminController@editCategory');
Route::post('/update-category', 'SuperAdminController@updateCategory');
Route::get('/delete-category/{id}', 'SuperAdminController@deleteCategory');
Route::get('/add-News', 'SuperAdminController@addNews');
Route::post('/save-News', 'SuperAdminController@saveNews');
Route::get('/manage-News', 'SuperAdminController@manageNews');
Route::get('/unpublish-News/{id}', 'SuperAdminController@unpublishNews');
Route::get('/publish-News/{id}', 'SuperAdminController@publishNews');
Route::get('/edit-News/{id}', 'SuperAdminController@editNews');
Route::post('/update-News', 'SuperAdminController@updateNews');
Route::get('/delete-News/{id}', 'SuperAdminController@deleteNews');
Route::get('/logout', 'SuperAdminController@logout');
Route::post('/search-News', 'SuperAdminController@searchNews');
Route::get('/comments', 'SuperAdminController@user_comments');
Route::get('/unpublish-comment/{id}', 'SuperAdminController@unpublishComment');
Route::get('/publish-comment/{id}', 'SuperAdminController@publishComment');
Route::get('/edit-comment/{id}', 'SuperAdminController@editComment');
Route::post('/update-comment', 'SuperAdminController@updateComment');
Route::get('/delete-comment/{id}', 'SuperAdminController@deleteComment');




Auth::routes();

Route::get('/home', 'HomeController@index');
