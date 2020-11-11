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

Route::get('/admin', function () {
    return view('auth.login');
});


Route::get('home','Homecontroller@index'); 
Route::get('/admin/logout', 'Homecontroller@getLogout');
Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::get('/profile','Homecontroller@profile');
Route::get('/user','Usercontroller@index');
Route::post('/create','Usercontroller@create');
Route::post('/adduser','Usercontroller@adduser');

Route::get('/edit_profile/{id}','Usercontroller@edit_profile');
Route::post('/post_edit_profile','Usercontroller@post_edit_profile');

Route::post('/edit_password','Usercontroller@edit_password');
Route::get('/delete_user/{id}','Usercontroller@delete_user');

Route::get('/permision','Usercontroller@permision');
Route::post('/post_permission','Usercontroller@post_permission');

Route::get('/product','Productcontroller@index');
Route::post('/create','Productcontroller@create');
Route::post('/subcreate','Productcontroller@subcreate');
Route::post('/addproduct','Productcontroller@addproduct');
Route::get('/loadgallery/{id}','Productcontroller@loadgallery');
Route::post('/uploadgallery','Productcontroller@uploadgallery');
Route::get('/edit_product/{id}','Productcontroller@edit_product');
Route::post('/post_edit_product','Productcontroller@post_edit_product');
Route::get('/delete_product/{id}','Productcontroller@delete_product');

Route::get('/order','Ordercontroller@index');
Route::get('/view_order/{id}','Ordercontroller@view_order');
Route::get('/edit_order/{id}','Ordercontroller@edit_order');
Route::post('/post_edit_order','Ordercontroller@post_edit_order');


Route::get('/finance','Financecontroller@index');
Route::get('/invoice/{id}','Financecontroller@view_invoice');


Route::get('/customer','Customercontroller@index');
Route::get('/view_customerprofile/{id}','Customercontroller@view_customerprofile');
Route::get('/status_change/{id}','Customercontroller@status_change');
Route::get('/edit_customerprofile/{id}','Customercontroller@edit_customerprofile');
Route::post('/post_edit_customerprofile','Customercontroller@post_edit_customerprofile');
Route::post('/edit_customerpassword','Customercontroller@edit_customerpassword');


Route::get('/courses','Coursescontroller@index');
Route::post('/addcourses','Coursescontroller@addcourses');
Route::get('/edit_courses/{id}','Coursescontroller@edit_courses');
Route::post('/post_edit_courses','Coursescontroller@post_edit_courses');
Route::get('/status_changecourses/{id}','Coursescontroller@status_changecourses');
Route::get('/delete_courses/{id}','Coursescontroller@delete_courses');
Route::get('/load_courses_gallery/{id}','Coursescontroller@loadgallery');
Route::post('/upload_courses_gallery','Coursescontroller@uploadgallery');




Route::get('/tour','Tourcontroller@index');
Route::get('/addtour','Tourcontroller@add_tour');
Route::post('/addtour','Tourcontroller@addtour');
Route::get('/status_changetour/{id}','Tourcontroller@status_changetour');
Route::get('/delete_tour/{id}','Tourcontroller@delete_tour');
Route::get('/edit_tour/{id}','Tourcontroller@edit_tour');
Route::post('/post_edit_tour','Tourcontroller@post_edit_tour');
Route::get('/tour_request','Tourcontroller@tour_request');



Route::get('/boat','Boatcontroller@index');
Route::get('/add_boat','Boatcontroller@add_boat');
Route::post('/addboat','Boatcontroller@addboat');
Route::get('/load_boat_gallery/{id}','Boatcontroller@loadgallery');
Route::post('/upload_boat_gallery','Boatcontroller@uploadgallery');
Route::get('/status_change_boat/{id}','Boatcontroller@status_changeboat');
Route::get('/delete_boat/{id}','Boatcontroller@delete_boat');
Route::get('/edit_boat/{id}','Boatcontroller@edit_boat');
Route::post('/post_edit_boat','Boatcontroller@post_edit_boat');
Route::post('/post_edit_gallery','Boatcontroller@post_edit_gallery');



Route::get('/classes','Classescontroller@index');
Route::post('/addclasses','Classescontroller@addclasses');
Route::post('/getlocation','Classescontroller@getlocation');
Route::get('/status_changeclasses/{id}','Classescontroller@status_changecourses');
Route::get('/edit_classes/{id}','Classescontroller@edit_classes');
Route::post('/post_edit_classes','Classescontroller@post_edit_classes');
Route::get('/delete_classes/{id}','Classescontroller@delete_classes');

Route::get('/get_request','Classescontroller@get_request');
Route::get('/status_changerequst/{id}','Classescontroller@status_changerequst');


Route::get('/add_banner','HomeController@banner');
Route::post('/upload_banner','HomeController@upload_banner');
Route::get('/banner','HomeController@view_banner');
Route::get('/delete_banner/{id}','HomeController@delete_banner');
Route::get('/edit_banner/{id}','HomeController@edit_banner');
Route::post('/post_edit_banner','HomeController@post_edit_banner');

Route::get('/add_client','HomeController@add_client');
Route::post('/upload_our_client','HomeController@upload_client');
Route::get('/delete_client/{id}','HomeController@delete_client');


Route::get('/advertisement','HomeController@view_advertisement');
Route::get('/add_advertisement','HomeController@add_advertisement');
Route::post('/add_advertisement','HomeController@post_advertisement');
Route::get('/delete_adver/{id}','HomeController@delete_adver');
Route::get('/status_advert/{id}','HomeController@status_advert');
Route::get('/edit_advertisement/{id}','HomeController@edit_advertisement');
Route::post('/post_edit_advertisement','HomeController@post_edit_advertisement');

Route::get('/web_content','HomeController@web_content');
Route::post('/get_content','HomeController@get_content');
Route::post('/post_content','HomeController@post_content');

Route::get('/store','HomeController@store');
Route::get('/add_store','HomeController@add_store');
Route::post('/add_store','HomeController@post_add_store');
Route::get('/status_store/{id}','HomeController@status_store');
Route::get('/delete_store/{id}','HomeController@delete_store');
Route::get('/edit_store/{id}','HomeController@edit_store');
Route::post('/edit_store','HomeController@post_edit_store');


Route::get('/our_team','HomeController@team');
Route::get('/add_team','HomeController@add_team');
Route::post('/add_team','HomeController@post_add_team');
Route::get('/status_team/{id}','HomeController@status_team');
Route::get('/delete_team/{id}','HomeController@delete_team');
Route::get('/edit_team/{id}','HomeController@edit_team');
Route::post('/edit_team','HomeController@post_edit_team');

Route::get('/add_gallery','HomeController@add_gallery');
Route::post('/upload_gallery','HomeController@upload_gallery');
Route::get('/delete_gallery/{id}','HomeController@delete_gallery');


Route::get('/benefit','Membershipcontroller@index');
Route::post('/benefit','Membershipcontroller@create');
Route::get('/edit_benefit/{id}','Membershipcontroller@edit_benefit');
Route::post('/edit_benefit','Membershipcontroller@post_edit_benefit');
Route::get('/delete_benefit/{id}','Membershipcontroller@delete_benefit');


Route::get('/packages','Membershipcontroller@packages');
Route::post('/packages','Membershipcontroller@post_packages');
Route::get('/edit_packages/{id}','Membershipcontroller@edit_packages');
Route::post('/edit_packages','Membershipcontroller@post_edit_packages');

Route::get('/view_subscribe','HomeController@view_subscribe');
Route::get('/delete_subscribe/{id}','HomeController@delete_subscribe');

Route::get('/certification','HomeController@certification');
Route::post('/certification','HomeController@post_certification');
Route::get('/delete_certification/{id}','HomeController@delete_certification');






/***************************Tranner*******************************************************/

Route::get('/my_classes','Trannercontroller@index');
Route::get('/accessories','Trannercontroller@accessories');
Route::post('/request_accessories','Trannercontroller@request_accessories');
Route::post('/showmyclass','Trannercontroller@showmyclass');
Route::get('/tranner_status/{id}/{value}','Trannercontroller@tranner_status');










      /***************************WEBSITE*******************************************************/

Route::get('/','Webcontroller@index');
Route::post('/users_login','Loginusercontroller@do_login');
Route::get('/userlogout', 'Webcontroller@userlogout');

Route::get('login/google', 'Loginusercontroller@redirectToProvider');
Route::get('login/google/callback', 'Loginusercontroller@handleProviderCallback');


Route::get('/login/facebook', 'Loginusercontroller@redirectToProviderfacebook');
Route::get('/login/facebook/callback', 'Loginusercontroller@handleProviderCallbackfacebook');


 Route::group(['middleware' => ['customer']], function () {

});
Route::get('/product_detail/{id}','Webcontroller@product_detail');
Route::get('/registration','Webcontroller@registration');
Route::post('/post_registration','Webcontroller@post_registration');
Route::get('/product_listing','Productlistcontroller@index');
Route::get('/product_listing','Productlistcontroller@index');

Route::get('/cart','Cartcontroller@index');
Route::post('/add_cart','Cartcontroller@addcart');
Route::get('/contact_us','Webcontroller@contact_us');
Route::post('/contact_us','Webcontroller@post_contact_us');

Route::get('/courses_list','Courseslistcontroller@index');
Route::get('/courses_detail/{id}','Courseslistcontroller@courses_detail');

Route::get('/tour_list','Tourlistcontroller@index');
Route::get('/tour_detail/{id}','Tourlistcontroller@tour_detail');
Route::post('/tour_inquery','Tourlistcontroller@tour_inquery');



Route::get('/delete_cart/{id}','Cartcontroller@delete_cart');
Route::post('/check_out','Cartcontroller@check_out');
Route::post('/updatecart','Cartcontroller@updatecart');


Route::post('/search_courses','Courseslistcontroller@search');
Route::post('/search_tour','Tourlistcontroller@search');
Route::post('/search_product','Productlistcontroller@search');
Route::get('/team','Webcontroller@ourteam');
Route::get('/addfav/{id}','Webcontroller@addfav');
Route::get('/addfav_course/{id}','Webcontroller@addfav_course');

Route::get('/forgot_password','Forgotcontroller@forgot_password');
Route::post('/forgot_password','Forgotcontroller@password');
Route::get('/rest_password/{code}','Forgotcontroller@rest_password');
Route::post('/post_rest_password','Forgotcontroller@post_rest_password');


Route::get('/boat_list','Boatlistcontroller@index');
Route::get('/boat_detail/{id}','Boatlistcontroller@boat_detail');



Route::get('/my_account', 'Webcontroller@my_account');
Route::post('/my_account', 'Webcontroller@update_my_account');
Route::get('/change_password', 'Webcontroller@change_password');
Route::post('/change_password', 'Webcontroller@post_change_password');
Route::get('/my_wish_list', 'Webcontroller@my_wish_list');
Route::get('/delete_wishlist/{id}','Webcontroller@delete_wishlist');
Route::get('/my_order', 'Webcontroller@my_order');

Route::get('/about_us','Webcontroller@about_us');
Route::get('/gallery','Webcontroller@gallery');

Route::get('/membership_plan','Webcontroller@membership_plan');
Route::get('/terms','Webcontroller@terms');
Route::get('/privacy_policy','Webcontroller@privacy_policy');
Route::post('/subscribe','Webcontroller@subscribe');

Route::get('/search_tours/{id}','Tourlistcontroller@search_tours');
Route::get('/search_rent','Productlistcontroller@search_rent');


