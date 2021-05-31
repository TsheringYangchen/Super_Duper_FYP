<?php
    use Illuminate\Support\Facades\Input;
    /*
    * Admin Routes
    */
    Route::prefix('admin')->group(function() {

     Route::middleware('auth:admin')->group(function() {
    // Dashboard
    Route::get('/', 'DashboardController@index');

    // License Holders
     Route::resource('/products','ProductController');

    //Issuers/Users
    Route::get('/add','UsersController@add');
    Route::resource('/users','UsersController');

    Route::post('/user/register','Front\RegistrationController@store');

    // Logout
    Route::get('/logout','AdminUserController@logout');

    });

    // Admin Login
    Route::get('/login', 'AdminUserController@index');
    Route::post('/login', 'AdminUserController@store');
    });
    //admin routes

    /*
    * Front Routes
    */
    Route::get('/', 'Front\HomeController@index');
    Route::get('admin/viewLicense', 'Front\RegistrationController@viewLicense');
    Route::get('/search', 'Front\RegistrationController@search');
    Route::get('/search/filter', 'Front\RegistrationController@searchfilter');
 
    //BIN/EIN
    Route::post('/getbin','BinController@store');
    
    Route::post('/getein','EinController@store');
    Route::get('admin/viewbin', 'BinController@viewbin');
    Route::get('admin/viewein', 'EinController@viewein');

    //Search viewbin/viewein
    Route::get('/searchbin', 'BinController@search');
    Route::get('/searchein', 'EinController@search');

    //License Edit and update
    Route::get('admin/license-edit/{id}','Front\RegistrationController@editLicense')->middleware('auth:admin');
    Route::put('/licenseupdate/{id}','Front\RegistrationController@update');

    //Search License Edit and Update
    Route::get('admin/edit/{id}','Front\RegistrationController@editLicense');
    Route::put('/update/{id}','Front\RegistrationController@update');

    Route::get('/deleteLH/{id}','Front\RegistrationController@deleteLicense');
    Route::post('front/licensee-login','Front\RegistrationController@Holder');
    
    //1. Delete Users/Issuers
    Route::get('/deleteIR/{id}','UsersController@deleteIssuer');

    //2. Search Users/Issuers
    Route::get('/searchIR', 'UsersController@find');

    //3. Edit and Update Issuers/Users
    Route::get('admin/issuer-edit/{id}','UsersController@editIssuer');
    Route::put('/updateissuer/{id}','UsersController@update');

    //4. Reports Uploads
    Route::resource('/document', 'DocumentController')->middleware('auth:admin');
    Route::post('update-document/{id}', ['as' => 'update-document', 'uses' => 'DocumentController@update']);
    Route::get('/delete-report/{id}','DocumentController@destroy');
    Route::get('download','DocumentController@downfunc');

    Route::post('/license/register','Front\RegistrationController@license')->middleware('auth:admin');

    // User Login
    Route::get('/user/login','Front\SessionsController@index');
    Route::post('/user/login','Front\SessionsController@store');

     // Logout
    Route::get('/user/logout','Front\SessionsController@logout');

    //Profile Picture    
    Route::get('/user/profile', 'Front\UserProfileController@index');
    Route::post('/user/profile', 'Front\UserProfileController@update_avatar')->name('profile.update');
        
    Route::get('/user/profile/change-password', 'Front\UserProfileController@changepw');
    Route::post('/user/profile/update-password', 'Front\UserProfileController@updatepw');

    //Route for remaining frontend
    //Route::get('/download','RouteController@download'); 
    Route::get('/licensee-login','RouteController@licensee');
    Route::get('/bin','RouteController@bin')->middleware('auth');
    
    Route::get('front/success','RouteController@info');
    Route::get('/ein','RouteController@ein')->middleware('auth');

    Route::get('/infringement','RouteController@infringement')->name('infringe');
    Route::get('/License-Status','RouteController@status')->name('status');
       
       

        

