<?php

Route::get('/','Site\HomeController@index')->name('home');

Route::get('/sitio', 'Site\SitioController@index')->name('sitio');

Route::get('/eventos', 'Site\EventosController@index')->name('eventos');
Route::get('/eventos/show/{id}', 'Site\EventosController@show')->name('eventos.show');
Route::get('/eventos/confirm/{id}', 'Site\EventosController@confirm')->name('eventos.confirm');
Route::post('/eventos/confirm', 'Site\EventosController@postConfirm')->name('eventos.postConfirm');

Route::get('/fotos', 'Site\FotosController@index')->name('fotos');

Route::get('/gastronomia', 'Site\GastronomiaController@index')->name('gastronomia');

Route::get('/localizacao', 'Site\LocalizacaoController@index')->name('localizacao');

Route::get('/login', 'Painel\LoginController@index')->name('login');

Route::get('/logout', 'Painel\LoginController@logout')->name('logout');

Route::post('/login', 'Painel\LoginController@login')->name('auth');

Route::group(['prefix' => 'painel', 'namespace' => 'Painel', 'middleware' => 'logado'],function() {

    Route::get('/', function(){
        return redirect()->route('dash');
    });

    Route::get('/dashboard', 'DashboardController@index')->name('dash');

    // USERS

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', 'UserController@index')->name('users');

        Route::get('/edit/{id}', 'UserController@edit')->name('edit');

        Route::get('/delete/{id}', 'UserController@delete')->name('delete');

        Route::get('/new', 'UserController@create')->name('user.create');

        Route::post('/store', 'UserController@store')->name('user.store');
    });

    // FOTOS

    Route::group(['prefix' => 'fotos'], function() {

        Route::get('/', 'FotosController@index')->name('fotos.index');

        Route::get('/new', 'FotosController@create')->name('fotos.create');

        Route::post('/store', 'FotosController@store')->name('fotos.store');

        Route::get('/delete/{id}', 'FotosController@delete')->name('fotos.delete');
    });

    // EVENTOS

    Route::group(['prefix' => 'eventos'], function() {

        Route::get('/', 'EventosController@index')->name('eventos.index');

        Route::get('/new', 'EventosController@create')->name('eventos.create');

        Route::post('/store', 'EventosController@store')->name('eventos.store');

        Route::get('/delete/{id}', 'EventosController@delete')->name('eventos.delete');

        Route::get('/edit/{id}', 'EventosController@edit')->name('eventos.edit');

        Route::post('/update', 'EventosController@update')->name('eventos.update');

        Route::get('/reserva/{id}', 'EventosController@reserva')->name('eventos.reserva');

        Route::get('/reserva/delete/{id}', 'EventosController@deleteReserva')->name('cancela.reserva');

    });

    // GASTRONOMIA ( CARDAPIO )

    Route::group(['prefix' => 'cardapio'], function() {

        Route::get('/', 'CardapioController@index')->name('cardapio.index');

        Route::get('/new', 'CardapioController@create')->name('cardapio.create');

        Route::post('/store', 'CardapioController@store')->name('cardapio.store');

        Route::get('/delete/{id}', 'CardapioController@delete')->name('cardapio.delete');
    });



});
