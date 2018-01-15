<?php

namespace App\Logics;

use Illuminate\Http\Request;

class CubeSummationLogic
{
	public static  function setArrayWithCero($size_matrix)
	{
		for ($x=1; $x <= $size_matrix; $x++) 
		{ 
			for ($y=1; $y <= $size_matrix; $y++) 
			{ 
				for ($z=1; $z <= $size_matrix; $z++) 
				{ 
					$array_cube [$x][$y][$z] = 0;
				}
			}
		}

		return $array_cube;

	}
    public  static function validation_fields(Request $request)
    {
    	$validator = \Validator::make($request->all(), [
            'test_cases' => 'required|numeric|min:1|max:50',
            'size_matrix' => 'required|numeric|min:1|max:100',
            'number_operations' => 'required|numeric|min:1|max:1000',
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