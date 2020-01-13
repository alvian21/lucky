<?php

Route::group(['prefix' => 'admin',
                'namespace' => 'Dashboard'
         ], function () {

           Route::get('/dashboard','DashboardController@index');
            Route::get('/pengeluaran','PengeluaranController@index')->name('pengeluaran');
            Route::get('/pengeluaran/create','PengeluaranController@show')->name('pengeluaran.show');
            Route::post('/pengeluaran/create','PengeluaranController@create')->name('pengeluaran.create');
            Route::post('/pengeluaran/edit','PengeluaranController@edit')->name('pengeluaran.edit');
            Route::get('/pengeluaran/delete','PengeluaranController@delete')->name('pengeluaran.delete');
            Route::get('/pemasukan','PemasukanController@index')->name('pemasukan');
            Route::get('/pemasukan/create','PemasukanController@show')->name('pemasukan.show');
            Route::post('/pemasukan/create','PemasukanController@create')->name('pemasukan.create');
            Route::post('/pemasukan/edit','PemasukanController@edit')->name('pemasukan.edit');
            Route::get('/pemasukan/delete','PemasukanController@delete')->name('pemasukan.delete');

});
