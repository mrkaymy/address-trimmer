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

    $longAddress = $request->input('data');
    $maxLenghtPerLine = 30;
    $lines = ceil(strlen($longAddress)/$maxLenghtPerLine);

    $startLine = 0;
    for($i=1;$i<=$lines;$i++) {

        if ($i == $lines) {
            $result['Address' . $i] = $longAddress;
            break;
        }

        $lastSpace = strrpos(substr($longAddress, $startLine, $maxLenghtPerLine), ' ');
        $result['Address' . $i] = substr($longAddress, 0, $lastSpace);
        $longAddress = trim(str_replace($result['Address' . $i], '', $longAddress));
    }

    return response()->json($result);
});

$router->post('v2/addressTrimmer', 'AddressTrimmerController@trim');