<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Publipresse\Forms\Classes\FilePond')
    ->prefix('publipresse/forms')
    ->group(function () {
        Route::post('/process', 'FilePondController@upload')->name('filepond.upload');
        Route::delete('/process', 'FilePondController@delete')->name('filepond.delete');
    });
