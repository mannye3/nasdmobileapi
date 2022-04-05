<?php

namespace App\Http\Controllers\API;

use App\Models\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoController extends Controller
{
    public function security_logo   ($symbol)
    {

        return  $logo_details =  Logo::where('symbol', $symbol)->first();


                    // $data = [
                    //     'Broker' => $broker_details,

                    // ];

                    // response()->json([
                    //         'status' => 200,
                    //          'Broker' => $data
                    //             ]);

            }




            public function logos()
    {

        return $logos = Logo::all();

           $data = [
                           $brokers,

                    ];

                //   return  response()->json([
                //             'status' => 200,
                //              'Brokers' => $data
                //                 ]);

            }
}
