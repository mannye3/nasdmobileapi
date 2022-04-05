<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
     public function security_performance($symbol)
         {


         $dateM= date('Y');


            $trade_report_charts = DB::select("SELECT `Close Price` AS CLOSE_PRICE , `Date` AS Trade_date  FROM general_market_summary WHERE Security ='$symbol' AND  `Date` > '$dateM' ");




                    foreach ($trade_report_charts as $trade_report_chart):

                     $usi = $trade_report_chart->CLOSE_PRICE;
                        $date = $trade_report_chart->Trade_date;
                        $date = strtotime($date);
                        $date *= 1000;
                         $data[] = [$date , $usi];




                            endforeach;

                             return json_encode($data);




            }




}
