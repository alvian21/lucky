<?php

Route::group(['prefix' => 'admin',
            'middleware'=>'auth',
                'namespace' => 'Dashboard'
         ], function () {

           Route::get('/dashboard','DashboardController@index');
           Route::get('/data','DataController@index')->name('data');
           Route::get('/data/delete','DataController@delete');
            Route::get('/pengeluaran','PengeluaranController@index')->name('pengeluaran');
            Route::get('/pengeluaran/create','PengeluaranController@show')->name('pengeluaran.show');
            Route::post('/pengeluaran/create','PengeluaranController@create')->name('pengeluaran.create');
            Route::post('/pengeluaran/create/total','PengeluaranController@total');
            Route::post('/pengeluaran/edit','PengeluaranController@edit')->name('pengeluaran.edit');
            Route::get('/pengeluaran/delete','PengeluaranController@delete')->name('pengeluaran.delete');
            Route::get('/pemasukan','PemasukanController@index')->name('pemasukan');
            Route::get('/pemasukan/create','PemasukanController@show')->name('pemasukan.show');
            Route::post('/pemasukan/create','PemasukanController@create')->name('pemasukan.create');
            Route::post('/pemasukan/create/total','PemasukanController@total');
            Route::post('/pemasukan/create/fetchjumlah','PemasukanController@fetchjumlah');
            Route::post('/pemasukan/edit','PemasukanController@edit')->name('pemasukan.edit');
            Route::get('/pemasukan/delete','PemasukanController@delete')->name('pemasukan.delete');

            Route::get('/ajaxdashboard','DashboardController@ajax');
            Route::get('/logout','DashboardController@logout')->name('logoutlogin');

});
