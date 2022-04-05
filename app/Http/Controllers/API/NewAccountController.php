<?php

namespace App\Http\Controllers\API;

use App\Models\NewAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewAccountController extends Controller
{


    public function account($ACCOUNTNUMBER)
    {

        return  $broker_details =  NewAccount::where('ACCOUNTNUMBER', $ACCOUNTNUMBER)->orWhere('CHN', $ACCOUNTNUMBER)->first();

       

                    // $data = [
                    //     'Broker' => $broker_details,

                    // ];

                    // response()->json([
                    //         'status' => 200,
                    //          'Broker' => $data
                    //             ]);

            }




 
    public function accounts()
    {

        return $accounts = NewAccount::all();

           $data = [
                           $brokers,

                    ];

                //   return  response()->json([
                //             'status' => 200,
                //              'Brokers' => $data
                //                 ]);

            }




            
}
