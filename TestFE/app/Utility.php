<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    public static function call_webservice($data,$action,$ruta){
		
		$data_string = json_encode($data);

        $ch = curl_init($ruta);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $action);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        //execute post
        $result = json_decode(curl_exec($ch));

        //close connection
        curl_close($ch);


    	return $result;

    }
}
