<?php

Route::group(['prefix' => 'admin',
                'namespace' => 'Dashboard'
         ], function () {

            Route::resource('dashboard', 'DashboardController');
            Route::get('/pengeluaran','PengeluaranController@index')->name('pengeluaran');
            Route::get('/pengeluaran/create','PengeluaranController@show')->name('pengeluaran.show');
            Route::post('/pengeluaran/create','PengeluaranController@create')->name('pengeluaran.create');
            Route::get('/pemasukan','PemasukanController@index')->name('pemasukan');
            Route::get('/pemasukan/create','PemasukanController@show')->name('pemasukan.show');
            Route::post('/pemasukan/create','PemasukanController@create')->name('pemasukan.create');
});
