<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utility;
class TestController extends Controller
{

    /**
    *   Funcion: index.
    *   Explicacion: Esta función se encarga de traer los datos del api para luego redireccionarlo
    *   y usar los datos para un listado de clientes
    **/

    public function index(){
        
        $path = 'http://socialh4ck.com/dev/jobs/test/frontend/data.json';
        $data = [];

        $response = Utility::call_webservice($data,"GET",$path);

        if ( $response != NULL ){

            return \View::make('layout', ['data' => $response]);

        }

        
    }

    /**
    *   Funcion: show_friends.
    *   Explicacion: Esta función se encarga de traer los datos del api para luego redireccionarlo
    *   y usar los datos para un listado de amigos del cliente
    **/

    public function show_friends( $id )
    {
        $path = 'http://socialh4ck.com/dev/jobs/test/frontend/data.json';
        $data = [];

        $response = Utility::call_webservice($data,"GET",$path);
        if ( $response != NULL ){

            foreach ($response as $key => $value) {
            
                if ( $value->id == $id ){

                    $information = $value;
                }


            }

            return \View::make('user.show', ['data' => $information]);
        }
        
        return redirect('/');
            


    }

    /**
    *   Funcion: location.
    *   Explicacion: Esta función se encarga de traer los datos del api para luego redireccionarlo
    *   y usar los datos para crear un mapa con sus respectivos marcadores.
    **/

    public function location(){

        $path = 'http://socialh4ck.com/dev/jobs/test/frontend/data.json';
        $data = [];
        $information = "";

        $response = Utility::call_webservice($data,"GET",$path);
        
        if ( $response != NULL ){

            foreach ($response as $key => $value) {
                $information = $value->latitude."&".$value->longitude."/".$information;
            }
        
            return \View::make('user.location', ['data' => $information] );
        
        }

    }
}
