<?php

Route::group(['prefix' => 'admin',
                'namespace' => 'Dashboard'
         ], function () {

            Route::resource('dashboard', 'DashboardController');
});
