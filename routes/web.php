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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->post('v1/addressTrimmer', function (\Illuminate\Http\Request $request) {
    $this->validate($request, [
        'data' => 'required|max:90'
    ]);

    $arrayAddress = str_split($request->input('data'), 30);

    $i = 1;
    foreach ($arrayAddress as $address) {
        $result['address' . $i++] = trim($address);
    }

    return response()->json($result);
});

$router->post('v2/addressTrimmer', 'AddressTrimmerController@trim');