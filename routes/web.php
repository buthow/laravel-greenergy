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

Route::get('/admin/login','AdminController@login_form');

// FrontEnd Routes
Route::group(['middleware' => ['web']], function () {

    Route::get('/admin/register','AdminController@register');
    Route::post('/admin/login','AdminController@login');

    // Login
    Route::get('/login','FrontEndController@login_form');
    Route::post('/login','FrontEndController@login');

    // Logout
    Route::get('/logout','FrontEndController@logout');

    // Register
    Route::post('/register','FrontEndController@register');

    // Index
    Route::get('/', 'FrontEndController@index');
    Route::post('/contact', 'FrontEndController@contact_form');

    //  News
    Route::get('/news', 'FrontEndController@news_index');
    Route::get('/news/{id?}', 'FrontEndController@news_page');

    //  CaseStudy
    Route::get('/casestudy', 'FrontEndController@case_index');
    Route::get('/casestudy/{id?}', 'FrontEndController@case_page');


    //  Product
    Route::get('/product', 'FrontEndController@product_index');
    Route::get('/product/{id?}', 'FrontEndController@product_page');





});
// create group middleare for user. but what to put inside? its almost the same as web
// for testing propuse first . ok any route

Route::group(['middleware' => ['user']], function(){
    // This for user authentication.
    Route::get('/casestudy/download/pdf/{id?}', 'FrontEndController@case_pdf_download');
    Route::get('/product/download/pdf/{id?}', 'FrontEndController@product_pdf_download');


});

// Backend Routes
Route::group(['middleware' => ['admin']], function () {

    Route::get('/admin','BackEndController@index');
    Route::get('/admin/logout','AdminController@logout');

    Route::get('/admin/about','BackEndController@about_edit_form');
    Route::post('/admin/about','BackEndController@about_edit');

    Route::get('/admin/quote','BackEndController@quote_edit_form');
    Route::post('/admin/quote','BackEndController@quote_edit');

    Route::get('/admin/slider','BackEndController@slider_edit_form');
    Route::post('/admin/slider','BackEndController@slider_edit');
    Route::get('/admin/slider/image/list','BackEndController@slider_image_list');
    Route::post('/admin/slider/upload','BackEndController@slider_image_upload');
    Route::get('/admin/slider/image/delete','BackEndController@slider_image_delete');

    Route::get('/admin/service','BackEndController@service_edit_form');
    Route::post('/admin/service','BackEndController@service_edit');

    Route::get('/admin/contact','BackEndController@contact_edit_form');
    Route::post('/admin/contact','BackEndController@contact_edit');

    Route::get('/admin/user/list','BackEndController@user_index');
    Route::get('/admin/user/add','BackEndController@user_add');
    Route::post('/admin/user/add','BackEndController@user_store');
    Route::get('/admin/user/edit/{id?}','BackEndController@user_edit_form');
    Route::post('/admin/user/edit/{id?}','BackEndController@user_edit');
    Route::get('/admin/user/delete/{id?}','BackEndController@user_destroy');

    Route::get('/admin/news/list','BackEndController@news_index');
    Route::get('/admin/news/add','BackEndController@news_add');
    Route::post('/admin/news/add','BackEndController@news_store');
    Route::get('/admin/news/edit/{id?}','BackEndController@news_edit');
    Route::post('/admin/news/edit/{id?}','BackEndController@news_update');
    Route::get('/admin/news/delete/{id?}','BackEndController@news_destroy');
    Route::get('/admin/news/image/list/{id?}','BackEndController@news_image_list');
    Route::post('/admin/news/image/upload/{id?}','BackEndController@news_image_upload');
    Route::get('/admin/news/image/delete/{id?}','BackEndController@news_image_delete');

    Route::get('/admin/case/list','BackEndController@case_index');
    Route::get('/admin/case/add','BackEndController@case_add');
    Route::post('/admin/case/add','BackEndController@case_store');
    Route::get('/admin/case/edit/{id?}','BackEndController@case_edit');
    Route::post('/admin/case/edit/{id?}','BackEndController@case_update');
    Route::get('/admin/case/delete/{id?}','BackEndController@case_destroy');


    Route::get('/admin/brand/list','BackEndController@brand_index');
    Route::get('/admin/brand/add','BackEndController@brand_add');
    Route::post('/admin/brand/add','BackEndController@brand_store');
    Route::get('/admin/brand/edit/{id?}','BackEndController@brand_edit');
    Route::post('/admin/brand/edit/{id?}','BackEndController@brand_update');
    Route::get('/admin/brand/delete/{id?}','BackEndController@brand_destroy');

    Route::get('/admin/product/list','BackEndController@product_index');
    Route::get('/admin/product/add','BackEndController@product_add');
    Route::post('/admin/product/add','BackEndController@product_store');
    Route::get('/admin/product/edit/{id?}','BackEndController@product_edit');
    Route::post('/admin/product/edit/{id?}','BackEndController@product_update');
    Route::get('/admin/product/delete/{id?}','BackEndController@product_destroy');
    Route::get('/admin/product/image/list/{id?}','BackEndController@product_image_list');
    Route::post('/admin/product/image/upload/{id?}','BackEndController@product_image_upload');
    Route::get('/admin/product/image/delete/{id?}','BackEndController@product_image_delete');





});

