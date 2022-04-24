<?php

namespace App\Http\Controllers\API;

use GuzzleHttp\Client;
use App\Models\GMSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    public function prices_vfd()
    {

        $client = new Client(); //GuzzleHttp\Client
        $url = "https://www.nasddatax.com/api/equity/ticker/update";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

         $responseBody = json_decode($response->getBody());

                $price_details = $responseBody;

                    $security_name = "";
                    $security_price = "";

                    foreach ($price_details as $trades) :
                        if($trades->security == "SDVFDGROUP")
                        {

                             $security_name = $trades->security;
                             $security_price = $trades->closeprice;
                        }

                    endforeach;

                    $data = [
                        'Security' => $security_name,
                        'Price' => $security_price
                    ];

                  return  response()->json([
                            'status' => 200,
                             'Ticker' => $data
                                ]);

            }




            public function price_list()
            {
                  $date =  GMSummary::latest('Date')->first();

                  $current_date =  $date->Date;


               return $prices = DB::select("SELECT general_market_summary.`Security`,general_market_summary.`Close Price`, general_market_summary.`Open Price`,general_market_summary.`52 Week High Price`,general_market_summary.`52 Week Low Price`,general_market_summary.`Change Percent`,`companies`.`issued_share_cap`
               FROM general_market_summary
               INNER JOIN companies ON companies.c_symbol = general_market_summary.Security WHERE `general_market_summary`.`Date` = '$current_date' ");




                    }



                      public function priceList($security)
            {

                    $date =  GMSummary::latest('Date')->where('Security', $security)->first();

                     $current_date =  $date->Date;


               return $prices = DB::select("SELECT general_market_summary.`Security`,general_market_summary.`Close Price`, general_market_summary.`Open Price`,general_market_summary.`52 Week High Price`,general_market_summary.`52 Week Low Price`,general_market_summary.`Change Percent`,`companies`.`issued_share_cap`
               FROM general_market_summary
               INNER JOIN companies ON companies.c_symbol = general_market_summary.Security WHERE `general_market_summary`.`Date` = '$current_date' AND `general_market_summary`.`Security` = '$security'  ");




                    }



                    public function priceperformance($security)
                    {
                        $date =  GMSummary::latest('Date')->first();
                         $last_closeprice =  GMSummary::latest('Date')->where('Security', $security)->first();

                            $current_date =  $date->Date;

                        $start_of_year = date('Y-m-d',strtotime('first day of january'));


                        return  $trade_report = GMSummary::where('Security', $security)->whereBetween('Date', [$start_of_year, $current_date])->get();


                          foreach ($trade_report as $trade_report) :

                            $refprice =  $trade_report['Ref Price'];
                            $closeprice =  $last_closeprice['Close Price'];

                             $change =   $closeprice -  $refprice;
                             $percentage = ($change / $closeprice) * 100;

                              $data = [
                                'Open Price' => $refprice,
                                'Close Price' => $closeprice,
                                'Change' => $change,
                                'Percentage' => $percentage,

                            ];



                        endforeach;




                            }




                             public function security_bids1($symbol)
    {

        $client = new Client(); //GuzzleHttp\Client
         $url = "http://38.17.52.42/ATS/Dealing/marketdataquant.aspx";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

         $responseBody = json_decode($response->getBody());

                $security_details = $responseBody;



                    foreach ($security_details as $security) :
                        if($security->Security == $security)
                        {
                            $security->Security =  $security;
                             $security->high =  $high;

                        }

                    endforeach;

                  return  $data = [
                        'Security' => $security_info,

                    ];

                  return  response()->json([
                            'status' => 200,
                             'Security' => $data
                                ]);

            }






            public function trades($security)
    {

        $client = new Client();
            $url = "http://38.17.52.42/ATS/Dealing/marketdataquant.aspx";

            $response = $client->request('GET', $url, [
                'verify'  => false,
            ]);


          $responseBody = json_decode($response->getBody());

                $price_details = $responseBody;




                    foreach ($price_details as $trades) :
                        if($trades->Security == $security)
                        {

                             $security_name = $trades->Security;
                             $count = $trades->count;
                             $openprice = $trades->openprice;
                             $closeprice = $trades->closeprice;
                             $volume = $trades->volume;
                             $highestqty = $trades->highestqty;
                             $lowestqty = $trades->lowestqty;
                             $value = $trades->value;
                             $high = $trades->high;
                             $low = $trades->low;
                             $bid = $trades->bid;
                             $ask = $trades->ask;


                        }

                    endforeach;

                    $data = [
                        'Security' => $security_name,
                        'count' => $count,
                        'openprice' => $openprice,
                        'closeprice' => $closeprice,
                        'volume' => $volume,
                        'highestqty' => $highestqty,
                        'lowestqty' => $lowestqty,
                        'value' => $value,
                        'high' => $high,
                        'low' => $low,
                        'bid' => $bid,
                        'ask' => $ask,



                    ];

                  return  response()->json([

                             $data
                                ]);

            }














}
