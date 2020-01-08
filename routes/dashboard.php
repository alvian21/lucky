<?php

Route::group(['prefix' => 'admin',
                'namespace' => 'Dashboard'
         ], function () {

            Route::resource('dashboard', 'DashboardController');
            Route::get('/pengeluaran','PengeluaranController@index')->name('pengeluaran');
            Route::get('/pemasukan','PemasukanController@index')->name('pemasukan');
});
