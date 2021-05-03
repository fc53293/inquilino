<?php



/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function (){
    //session()->put('Name','Gony');
    return view('home');
});

//$router->get('/', function () use ($router) {
  //  return $router->app->version();
//});

$router->group(['prefix' => 'api'], function($router)
{
    $router->post('user/add','InquilinoController@createInquilino');
    
    $router->get('inquilino/all','InquilinoController@allInquilinos');
    
    //$router->get('users/{username}','InquilinoController@showUserByUsername');
    
    $router->post('inquilino/remove/{id}','InquilinoController@deleteInquilino');
    
    //$router->post('inquilino/update/{id}','InquilinoController@updateInquilino');

    $router->get('users/all','InquilinoController@showAllUsers');
}); 


// Routes BACANOS
Route::group(['prefix' => ''], function () {

  Route::get('home', 'InquilinoController@goHome');

  Route::get('inquilinoProfile/{id}', 'InquilinoController@inquilinoProfile');

  Route::get('wallet/{id}', 'InquilinoController@showWallet');

  Route::get('payment', 'InquilinoController@showPaymentPage');

  Route::post('edit/{username}', 'InquilinoController@updateInquilino');

  Route::post('walletAdd/{id}', 'InquilinoController@addSaldo');

  Route::post('pay', 'InquilinoController@makePayment');

});

Route::get('testar/{username}', 'InquilinoController@inquilinoAluguerInfo');

Route::get('users/{username}','InquilinoController@showUserByUsername');
