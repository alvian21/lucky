<?php

Route::group(['prefix' => 'admin',
                'namespace' => 'Dashboard'
         ], function () {

            Route::resource('dashboard', 'DashboardController');
            Route::get('/pengeluaran','PengeluaranController@index')->name('pengeluaran');
            Route::get('/pengeluaran/create','PengeluaranController@show')->name('pengeluaran.show');
            Route::get('/pemasukan','PemasukanController@index')->name('pemasukan');
});
