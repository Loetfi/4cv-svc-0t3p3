<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use App\Helpers\Api;
$router->get('/', function () use ($router) {
    $data = $router->app->version();
    return response()->json(Api::format(1, $data, 'Success'), 200);
});

$router->post('/send-otp', 'OTPController@index');

// Route::get('/get-custom-column-datatables-data', 'DataTableController@getCustomColumnDatatablesData')->name('custom_column_datatables_users_data');

// get 
$router->get('/get-data', 'ListDataOTPController@getCustomColumnDatatablesData');
