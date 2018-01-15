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

    		$array_cube_summation = CubeSummationLogic::setArrayWithCero($request->size_matrix);

    		 
    		$output = CubeSummationLogic::generate_operation($array_cube_summation,$request->test_cases,$request->size_matrix,$request->number_operations);
    		

    		return $output;
    		
    	}else{

    		return $checkValidateFields;
    	}
    }
}
