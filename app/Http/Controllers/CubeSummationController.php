<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Logics\CubeSummationLogic;

class CubeSummationController extends Controller
{
    public function index()
    {
    	return view('cube_summation.cube_summation');
    }
    public function cube_summation(Request $request)
    {

    	$checkValidateFields = CubeSummationLogic::validation_fields($request);

    	if (!is_array($checkValidateFields)) {
    		
    	}else{

    		return $checkValidateFields;
    	}
    }
}
