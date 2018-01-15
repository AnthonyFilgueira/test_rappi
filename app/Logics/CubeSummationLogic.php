<?php

namespace App\Logics;

use Illuminate\Http\Request;

class CubeSummationLogic
{
    public  static function validation_fields(Request $request)
    {
    	$validator = \Validator::make($request->all(), [
            'test_cases' => 'required|min:1|max:50',
            'matrix' => 'required|min:1|max:100',
            'number_operations' => 'required|min:1|max:1000',
        ]);
     
        if($validator->fails())
        {
            $errors = $validator->errors();

            $response = ['error' => $errors->all()];
            
        }else{

        	$response = true;
        }
        
            return $response;
    }
}