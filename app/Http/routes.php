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

Route::get('/', function () {
   //return view('auth.login');
    return redirect()->route('login');
});

// LOGIN & PASSWORD
Route::group(['prefix' => 'site'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => '\CustomAuth'], function () {
        //Route::get('login', 'AuthController@getLogin')->name('login'); //obtener vista
        Route::get( 'login', [ 'as' => 'login', 'uses' => 'AuthController@getLogin' ] );//obtener vista
        //Route::post('login', 'AuthController@postLogin')->name('login.auth'); // enviar formulario
        Route::post( 'login.auth', [ 'as' => 'login.auth', 'uses' => 'AuthController@postLogin' ] );//enviar formulario
        //Route::get('logout/{user_id}', 'AuthController@getLogout')->name('logout'); // salir de la app
        Route::get( 'logout/{user_id}', [ 'as' => 'logout', 'uses' => 'AuthController@getLogout' ] );//enviar formulario
        //Route::get('session', 'AuthController@getSession')->name('session'); // session caducada
        Route::get( 'session', [ 'as' => 'session', 'uses' => 'AuthController@getSession' ] );//enviar formulario
        //Route::get('changePassword', 'AuthController@getChangePasswordView')->name('change.password.view'); // Obtener vista para cambio de la contraseña
        //Route::post('changePassword', 'AuthController@postChangePasswordSave')->name('change.password.save'); // Obtener vista para cambio de la contraseña
    });

    /*Route::group(['prefix' => 'password', 'namespace' => '\PasswordRequest'], function () {
        Route::post('request', 'PasswordRequestController@request')->name('password.request');
    });*/

    // REGISTER
    Route::group(['prefix' => 'register'], function () {
        // VISTAS
        //Route::get('new/user', 'ViewsController@register')->name('register'); //registro de usuario nuevo
        Route::get( 'register/socio', [ 'as' => 'register.partner', 'uses' => 'Register\RegisterViewsController@getRegisterPartners' ] );//obtener vista para que los socios se registren, reciban invitaciones a eventos (conecta COPARMEX Xalapa)
        Route::get( 'register/invitado', [ 'as' => 'register.guest', 'uses' => 'Register\RegisterViewsController@getRegisterGuest' ] );//obtener vista para invitar al público en general a eventos coparmex
        //http://localhost/conecta/public/site/register/register/socio
        // ACCIONES
        Route::post( 'register/socio', [ 'as' => 'register.partner', 'uses' => 'Register\RegisterCRUDController@CreateRegisterPartners' ] );//Registrar a socio
        //Route::post('new/user/moral/save', 'RegisterController@saveMoral')->name('register.moral.save'); //servicio para guardar un usuario moral nuevo
        //Route::post('new/user/fisica/save', 'RegisterController@saveFisica')->name('register.fisica.save'); //servicio para guardar un usuario moral nuevo
        //Route::post('new/user/consorcio/save', 'RegisterController@saveConsorcio')->name('register.consorcio.save'); //servicio para guardar un consorcio
    });
});

Route::group(['prefix' => 'visitante'], function()
{	
	Route::get( 'favoritos', [ 'as' => 'visitors.favorites', 'uses' => 'Visitors\VisitorsViewsController@getFavorites' ] );
	Route::get( 'mi-perfil', [ 'as' => 'visitors.myProfile', 'uses' => 'Visitors\VisitorsViewsController@getMyProfile' ] );
	Route::get( 'socios', [ 'as' => 'visitors.partners', 'uses' => 'Visitors\VisitorsViewsController@getPartners' ] );
});
