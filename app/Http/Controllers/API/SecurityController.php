<?php

namespace App\Http\Controllers\API;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecurityController extends Controller
{
    public function security($symbol)
    {

        $client = new Client(); //GuzzleHttp\Client
        $url = "https://www.nasddatax.com/api/equity/ticker/update";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

         $responseBody = json_decode($response->getBody());

                $security_details = $responseBody;



                    foreach ($security_details as $security) :
                        if($security->security == $symbol)
                        {
                            $security_info =  $security;

                        }

                    endforeach;

                    $data = [
                        'Security' => $security_info,

                    ];

                  return  response()->json([
                            'status' => 200,
                             'Security' => $data
                                ]);

            }


            public function securities()
    {

        $client = new Client(); //GuzzleHttp\Client
        $url = "https://www.nasddatax.com/api/equity/ticker/update";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

         $responseBody = json_decode($response->getBody());

                $securities = $responseBody;



                    $data = [
                         $securities,

                    ];

                  return  response()->json([
                            'status' => 200,
                             'Securities' => $data
                                ]);

            }




            public function marketindex()
            {

                $client = new Client(); //GuzzleHttp\Client
                 $url = "https://apis.nasdotcng.com/api/price_list";

                $response = $client->request('GET', $url, [
                    'verify'  => false,
                ]);

                 $responseBody = json_decode($response->getBody());

                 return $securities = $responseBody;



                            $data = [
                                 $securities,

                            ];

                            response()->json([
                                    'status' => 200,
                                     'Securities' => $data
                                        ]);

                    }
}
