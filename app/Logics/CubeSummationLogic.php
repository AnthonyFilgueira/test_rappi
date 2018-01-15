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

    public static function generate_operation($array_cube,$test_cases,$size_matrix,$number_operations)
    {
    	
    	$output_update_cube = [];
    	$output_query_cube = [];
    	$input_data = []; //Salida Grafica de los Datos de Entrada ejemplo: UPDATE x y z w
    	$output_data = [];// Salida Grafica de las sumatorias realizadas Ejemplo 0 0 25 31 15
    	$array_outputs = [];
    	for ($indexTestCases=1; $indexTestCases <= $test_cases; $indexTestCases++) 
    	{
		    array_push($input_data, "Caso de Prueba ".$indexTestCases);

	    	for ($i=1; $i <= $number_operations; $i++) 
	    	{ 
	    		$operation = rand(1,2);

		    	if ($operation == 1) 
		    	{

		    		$output_update_cube = CubeSummationLogic::update_cube($array_cube,$size_matrix);

		    		array_push($input_data, $output_update_cube[0]);

		    		$array_cube = $output_update_cube[1];

		    	}
		    	else if ($operation == 2) 
		    	{
		    		$output_query_cube = CubeSummationLogic::query_cube($array_cube,$size_matrix);

		    		array_push($input_data, $output_query_cube[0]);

		    		array_push($output_data, $output_query_cube[1]);
		    	}
	    	}
    	}
    	$array_outputs[0] = $input_data;
    	$array_outputs[1] = $output_data;
    	$array_outputs[2] = $array_cube;

    	return $array_outputs;
    }

    public static function update_cube($array_cube,$size_matrix)
    {
    	$output = [];

    	$x = rand(1,$size_matrix);
    	$y = rand(1,$size_matrix);
    	$z = rand(1,$size_matrix);

    	$lower_limit = pow(10, 9) * -1;
    	$upper_limit = pow(10,9);

    	$w = intdiv(rand($lower_limit,$upper_limit), 1000);

    	$array_cube[$x][$y][$z] = $w;

    	$output[0] = "UPDATE "."$x "."$y "."$z "."$w";

    	$output[1] = $array_cube;
    	
    	return $output;
    }

    public static function query_cube($array_cube,$size_matrix)
    {
    	$output = [];

    	$x2 = rand(1,$size_matrix);
    	$y2 = rand(1,$size_matrix);
    	$z2 = rand(1,$size_matrix);

    	$x1 = rand(1,$x2);
    	$y1 = rand(1,$y2);
    	$z1 = rand(1,$z2);

    	$output[0] = "QUERY "."$x1 "."$y1 "."$z1 "."$x2 "."$y2 "."$z2";

    	$output[1] = CubeSummationLogic::sum_positions_cube($array_cube,$x1,$y1,$z1,$x2,$y2,$z2);

    	return $output;
    }

    public static function sum_positions_cube($array_cube,$x1,$y1,$z1,$x2,$y2,$z2)
    {
    	$sum_positions_cube = 0;

    	for ($x=$x1; $x <= $x2; $x++) 
		{ 
			for ($y=$y1; $y <= $y2; $y++) 
			{ 
				for ($z=$z1; $z <= $z2; $z++) 
				{ 
					$sum_positions_cube += $array_cube [$x][$y][$z];
				}
			}
		}

		return $sum_positions_cube;
    }
}