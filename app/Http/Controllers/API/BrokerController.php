<?php

namespace App\Http\Controllers\API;

use App\Models\MAS;
use App\Models\Broker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrokerController extends Controller
{
    public function broker($sn)
    {

        return  $broker_details =  Broker::where('sn', $sn)->first();


                    // $data = [
                    //     'Broker' => $broker_details,

                    // ];

                    // response()->json([
                    //         'status' => 200,
                    //          'Broker' => $data
                    //             ]);

            }




            public function brokers()
    {

        return $brokers = Broker::all();

           $data = [
                           $brokers,

                    ];

                //   return  response()->json([
                //             'status' => 200,
                //              'Brokers' => $data
                //                 ]);

            }





           



}
