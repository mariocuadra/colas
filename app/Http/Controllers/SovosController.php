<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SovosController extends Controller
{
    public function getLogin(){


        $response = Http::withHeaders([

            'X-API-KEY' => env('API_KEY'),
         

            ])->post(env('API_ENDPOINT')."auth/login",[

                'user_name'=> "root",
                "user_pin" => "xN4Y3WTH"
            ]);

    
            return $response ['session_id'];

    }

    public function getDocByRut(Request $request){


        
        $session_id= $this->getLogin(); 

        $response = Http::withHeaders([

            'X-API-KEY' => env('API_KEY'),
         

            ])->get(env('API_ENDPOINT')."search",[

                'session_id'=> $session_id,
                'institution' => 'UBO',
                'rut' => '16360541-4'
            ]);

            dd($response->json());

    }


    public function getUserRegistered()
    {
        $response =http::withHeaders([

            'X-API-KEY' => env('API_KEY'),
         
        ])->get(env('API_ENDPOINT')."auth/register",[

            'rut' => '16360541-4'
      
        ]);

        dd($response->json());


    }

    
  public function  signUp(){

    $response =http::withHeaders([

        'X-API-KEY' => env('API_KEY'),
     
    ])->post(env('API_ENDPOINT')."auth/register",[

  
        "user_rut"=> "18732766-0",
        "user_name"=> "ANTONIO",
        "user_lastname" => "PARRAGUE",
        "user_birthday"=> "08-02-1995",
        "user_gender"=> "M",
        "user_phone"=> "+56959488283",
        "user_email"=> "antonio.parrague@gmail.com",
        "serial_number"=> "104558206"
    
    ]);


    dd($response->json());
  }


  public function recoverPass(){

    $response =http::withHeaders([

        'X-API-KEY' => env('API_KEY'),
     
    ])->post(env('API_ENDPOINT')."auth/register",[

  
        "user_rut"=> "18732766-0",
        "user_name"=> "ANTONIO",
        "user_lastname" => "PARRAGUE",
        "user_birthday"=> "08-02-1995",
        "user_gender"=> "M",
        "user_phone"=> "+56959488283",
        "user_email"=> "antonio.parrague@gmail.com",
        "serial_number"=> "104558206"
    
    ]);


    dd($response->json());
  }

}
