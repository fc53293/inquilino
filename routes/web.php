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

  Route::get('payment/{id}/rentNumber/{idRent}', 'InquilinoController@showPaymentPage');

  Route::post('/edit/{id}', 'InquilinoController@updateInquilino');

  Route::post('walletAdd/{id}', 'InquilinoController@addSaldo');

  Route::get('findPropriedade', 'InquilinoController@findPropriedade');

  Route::get('propertyInfo/{id}', 'InquilinoController@propertyInfo');

  Route::post('pay', 'InquilinoController@makePayment');
  
  Route::post('storeImg/{id}', 'InquilinoController@storeProfileImg');

  Route::post('renovar/{idUser}/{idProp}', 'InquilinoController@renovaArrendamento');

  Route::post('/notifications/{id}', 'InquilinoController@markNotificationRead');

  Route::get('/notifications/{id}', 'InquilinoController@getNotifications');

  Route::get('/chat', 'InquilinoController@chat');

  Route::get('/chat/searchUser/{name}', 'InquilinoController@searchUserChat');

  Route::post('/chat/message/', 'InquilinoController@postChatMessage');

  Route::get('/chat/messages/{sender}', 'InquilinoController@getAllMessages');

  Route::get('/chat/messages/{sender}/{receiver}', 'InquilinoController@getMessages');

  Route::get('/user/{id}', 'InquilinoController@getUserInfo');
});


Route::get('testar/{username}', 'InquilinoController@inquilinoAluguerInfo');

Route::get('users/{username}','InquilinoController@showUserByUsername');
