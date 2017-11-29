<?php
/**
 * Created by PhpStorm.
 * User: khairul
 * Date: 28/11/2017
 * Time: 9:17 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressTrimmerController extends Controller
{

    public function trim(Request $request) {

        $rules = [
            'data' => 'required|max:90'
        ];

        $this->validate($request, $rules);

        $arrayAddress = str_split($request->input('data'), 30);

        $i = 1;
        foreach ($arrayAddress as $address) {
            $result['address' . $i++] = trim($address);
        }

        return response()->json($result);

    }

}