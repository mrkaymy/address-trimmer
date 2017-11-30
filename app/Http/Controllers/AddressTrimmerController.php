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

    }

}