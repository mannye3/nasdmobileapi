<?php

namespace App\Http\Controllers\API;

use App\Models\Snapshot;
use App\Models\GMSummary;
use App\Models\MartketActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DateTime;



class SnapshotController extends Controller
{
    public function snapshot()
    {



error_reporting(0);

     $today = Snapshot::orderBy('present_date', 'DESC')->limit(1)->first();

     $yesterday = Snapshot::orderBy('present_date', 'DESC')->skip(1)->take(1)->first();





                     $usi = number_format((($today->usi - $yesterday->usi)/$yesterday->usi)*100,2);
                    if($usi > 0){
                         $usi;
                    } else if($usi < 0){
                          $usi = number_format($usi * -1,2);
                    } else {
                         $usi = $usi;
                    }


                  $mktcap = number_format((($today->capitalisation - $yesterday->capitalisation)/$yesterday->capitalisation)*100,2);
                    if($mktcap > 0){
                        $mktcap = $mktcap;
                    }else if($mktcap < 0){
                       $mktcap = number_format($mktcap * -1,2);
                    } else{
                        $mktcap = $mktcap;
                    }
        $tVolume = number_format((($today->volume - $yesterday->volume)/$yesterday->volume)*100,2);
                    if($tVolume > 0){
                        $tVolume = $tVolume;
                    }else if($tVolume < 0){
                       $tVolume = number_format($tVolume * 1,2);
                    } else{
                        $tVolume = $tVolume;
                    }
        $tValue = number_format((($today->value - $yesterday->value)/$yesterday->value)*100,2);
                    if($tValue > 0){
                        $tValue =$tValue;
                    }else if($tValue < 0){
                       $tValue = number_format($tValue * -1,2);
                    } else {
                        $tValue = $tValue;
                    }
        $deals = number_format((($today->deals - $yesterday->deals)/$yesterday->deals)*100,2);
                    if($deals > 0){
                        $deals = $deals;
                    }else if($deals < 0){
                       $deals = number_format($deals * -1,2);
                    } else{
                        $deals = $deals;
                    }





                    return  $data = [
                        'NSI Current' => $today->usi,
                        'NSI Change' => $usi,

                        'Mkt. Capitalization Current' => number_format($today->capitalisation/1000000000,2),
                        'Mkt. Capitalization Change' => $mktcap,

                        'Volume Traded Current' => number_format($tVolume),
                        'Volume Traded Change' => $tVolume,


                        'Value Traded Current ' => number_format($tValue) ,
                        'Value Traded Change ' => $tValue,


                        'Deals Executed Current ' => $today->deals,
                        'Deals Executed Change' => $deals,

                    ];



    }





    public function trade_history()
    {

                $start_of_week = date('Y-m-d', strtotime("this week"));
                $current_week_date =  date('Y-m-d');

                $start_of_month = date('Y-m-01');
                $current_month_date = date('Y-m-d');

                $start_of_year = date('Y-m-d',strtotime('first day of january'));
                $current_year_date = date('Y-m-d');





                // YEAR TO DATE RECORD//
                $total_deals = MartketActivity::whereBetween('DATE', [$start_of_year, $current_year_date])->sum('DEALS');
                $total_volume = MartketActivity::whereBetween('DATE', [$start_of_year, $current_year_date])->sum('VOLUME');
                $total_value = MartketActivity::whereBetween('DATE', [$start_of_year, $current_year_date])->sum('VALUE');



             // MONTH TO DATE RECORD//
              $total_deals_month = MartketActivity::whereBetween('DATE', [$start_of_month, $current_month_date])->sum('DEALS');
               $total_volume_month = MartketActivity::whereBetween('DATE', [$start_of_month, $current_month_date])->sum('VOLUME');
               $total_value_month = MartketActivity::whereBetween('DATE', [$start_of_month, $current_month_date])->sum('VALUE');


              // WEEK TO DATE RECORD//
                 $total_deals_week = MartketActivity::whereBetween('DATE', [$start_of_week, $current_week_date])->sum('DEALS');
                 $total_volume_week = MartketActivity::whereBetween('DATE', [$start_of_week, $current_week_date])->sum('VOLUME');
                 $total_value_week = MartketActivity::whereBetween('DATE', [$start_of_week, $current_week_date])->sum('VALUE');




                  return  $data = [
                        'Total Deals YTD' => number_format($total_deals),
                        'Volume Traded YTD' => number_format($total_volume),
                        'Value  Traded YTD' => number_format($total_value),

                        'Total Deals MTD' => number_format($total_deals_month),
                        'Volume Traded  MTD' => number_format($total_volume_month),
                        'Value  Traded MTD' => number_format($total_value_month),


                        'Total Deals WTD ' => number_format($total_deals_week),
                        'Volume Traded  WTD ' => number_format($total_volume_week),
                        'Value Traded WTD ' => number_format($total_value_week),


                    ];



    }



    public function security_trade_history($symbol)
    {

                $start_of_week = date('Y-m-d', strtotime("this week"));
                $current_week_date =  date('Y-m-d');

                $start_of_month = date('Y-m-01');
                $current_month_date = date('Y-m-d');

                $start_of_year = date('Y-m-d',strtotime('first day of january'));
                $current_year_date = date('Y-m-d');







                // YEAR TO DATE RECORD//
                $total_deals = MartketActivity::whereBetween('DATE', [$start_of_year, $current_year_date])->where('SYMBOL',$symbol)->sum('DEALS');
                $total_volume = MartketActivity::whereBetween('DATE', [$start_of_year, $current_year_date])->where('SYMBOL',$symbol)->sum('VOLUME');
                $total_value = MartketActivity::whereBetween('DATE', [$start_of_year, $current_year_date])->where('SYMBOL',$symbol)->sum('VALUE');



             // MONTH TO DATE RECORD//
              $total_deals_month = MartketActivity::whereBetween('DATE', [$start_of_month, $current_month_date])->where('SYMBOL',$symbol)->sum('DEALS');
               $total_volume_month = MartketActivity::whereBetween('DATE', [$start_of_month, $current_month_date])->where('SYMBOL',$symbol)->sum('VOLUME');
                $total_value_month = MartketActivity::whereBetween('DATE', [$start_of_month, $current_month_date])->where('SYMBOL',$symbol)->sum('VALUE');


              // WEEK TO DATE RECORD//
              $total_deals_week = MartketActivity::whereBetween('DATE', [$start_of_week, $current_week_date])->where('SYMBOL',$symbol)->sum('DEALS');
               $total_volume_week = MartketActivity::whereBetween('DATE', [$start_of_week, $current_week_date])->where('SYMBOL',$symbol)->sum('VOLUME');
             $total_value_week = MartketActivity::whereBetween('DATE', [$start_of_week, $current_week_date])->where('SYMBOL',$symbol)->sum('VALUE');




             return  $data = [
                        'Total Deals YTD' => number_format($total_deals),
                        'Volume Traded YTD' => number_format($total_volume),
                        'Value  Traded YTD' => number_format($total_value),

                        'Total Deals MTD' => number_format($total_deals_month),
                        'Volume Traded  MTD' => number_format($total_volume_month),
                        'Value  Traded MTD' => number_format($total_value_month),


                        'Total Deals WTD ' => number_format($total_deals_week),
                        'Volume Traded  WTD ' => number_format($total_volume_week),
                        'Value Traded WTD ' => number_format($total_value_week),


                    ];

    }


}
