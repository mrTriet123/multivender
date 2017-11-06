<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::group(['prefix'=>'cms'],function(){
    	Route::resource('pages', 'Admin\CmsPageController');
    	Route::resource('banners', 'Admin\CmsBannerController');
    	Route::resource('fqas', 'Admin\CmsFqaController');
    	Route::resource('testimonials', 'Admin\CmsTestimonialController');
	});
	Route::get('/contact_message', 'Admin\ContactMessagesController@show');
	Route::get('/contact_message/{contact_message_id}', 'Admin\ContactMessagesController@view');
	Route::get('/contact_message/{contact_message_id}/delete', 'Admin\ContactMessagesController@delete');
	Route::get('/contact_message/{contact_message_id}/reply', 'Admin\ContactMessagesController@getReply');
	Route::post('/contact_message/{contact_message_id}/reply', 'Admin\ContactMessagesController@postReply');
	Route::group(['prefix'=>'product'],function(){
    	Route::resource('brands', 'Admin\BrandController');
	});
    // Route::get('categories', 'Admin\CategoryController@index');
    // Route::post('categories', 'Admin\CategoryController@store');
    // Route::get('categories/{id}/edit', 'Admin\CategoryController@edit');
    // Route::post('categories/{id}/edit', 'Admin\CategoryController@update');
    // Route::get('categories/{id}/delete', 'Admin\CategoryController@destroy');

    Route::group(['prefix'=>'manager'],function(){
        // categories
        Route::get('categories', 'Admin\CategoryController@index');
        Route::post('categories', 'Admin\CategoryController@store');
        Route::get('categories/{id}/edit', 'Admin\CategoryController@edit');
        Route::post('categories/{id}/edit', 'Admin\CategoryController@update');
        Route::get('categories/{id}/delete', 'Admin\CategoryController@destroy');
        Route::post('checkDelete','Admin\CategoryController@checkDelete');

        // brands
        Route::resource('brands', 'Admin\BrandController');

        // shops
        Route::resource('shops', 'Admin\ShopManagementController');
        
        // products
        Route::resource('products', 'Admin\ProductController');
        Route::group(['prefix' => 'products'],function(){
            Route::post('data_product','Admin\DataProductController@postData');
            Route::post('{id}/data_edit','Admin\DataProductController@postEdit');
            Route::post('seo_product','Admin\SeoProductController@postCreate');
            Route::post('{id}/seo_edit','Admin\SeoProductController@postEdit');
        });
        Route::get('categories', 'Admin\CategoryController@index');
    });

    Route::get('manager/shops/{shop}/states','Admin\AjaxController@showState');


});





// Route::get('/test', function () { 
// 	return view('auth.emails.reply_messages');
// });