<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Route;
use Modules\Team\Http\Controllers\TeamAuthController;


Route::prefix('team')->group(function() {
    Route::get('/', 'TeamController@index');
});


if (isModuleActive('LmsSaas') || isModuleActive('LmsSaasMD')) {
    Route::group(['middleware' => ['subdomain']], function ($routes) {
        require('tenant.php');
    });
} else {        
    require('tenant.php');
}

Route::get('/authteam', 'TeamAuthController@authenticate')->name('auth.team');;
Route::get('/auth/team', 'TeamAuthController@callback');