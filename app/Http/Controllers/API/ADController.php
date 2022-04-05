<?php

namespace App\Http\Controllers\API;

use App\Models\GMSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ADController extends Controller
{

    public function losers()
    {
          $date =  GMSummary::latest('Date')->first();

         $current_date =  $date->Date;


       return $losers = DB::select("SELECT market_activity_sheet.SECURITY, market_activity_sheet.SYMBOL, market_activity_sheet.CLOSE_PRICE, market_activity_sheet.DEALS, market_activity_sheet.VOLUME, market_activity_sheet.VALUE , general_market_summary.`Ref Price` as refprice FROM `market_activity_sheet`

        INNER JOIN security_to_traded ON market_activity_sheet.SYMBOL=security_to_traded.`COL 11`

        INNER JOIN general_market_summary ON security_to_traded.`COL 11` = general_market_summary.Security WHERE market_activity_sheet.`DATE`='$current_date' AND general_market_summary.Date='$current_date' ");




        foreach ($losers as $loser) :


          $change =   $loser->CLOSE_PRICE -  $loser->refprice;
           $percentage = ($change / $loser->CLOSE_PRICE) * 100;

          if($change > 0)
          {
             echo $loser->SYMBOL.'<br>';

             echo $loser->refprice.'<br>';

             echo $loserj->CLOSE_PRICE.'<br>';

             echo $change.'<br>';

             echo $percentage.'<br>';

          }

        endforeach;



            }




            public function gainers()
            {
                $date =  GMSummary::latest('Date')->first();

                 $current_date =  $date->Date;


                $gainers = DB::select("SELECT market_activity_sheet.SECURITY, market_activity_sheet.SYMBOL, market_activity_sheet.CLOSE_PRICE, market_activity_sheet.DEALS, market_activity_sheet.VOLUME, market_activity_sheet.VALUE , general_market_summary.`Ref Price` as refprice FROM `market_activity_sheet`

                INNER JOIN security_to_traded ON market_activity_sheet.SYMBOL=security_to_traded.`COL 11`

                INNER JOIN general_market_summary ON security_to_traded.`COL 11` = general_market_summary.Security WHERE market_activity_sheet.`DATE`='$current_date' AND general_market_summary.Date='$current_date' ");




                foreach ($gainers as $gainer) :


                  $change =   $gainer->CLOSE_PRICE -  $gainer->refprice;
                   $percentage = ($change / $gainer->CLOSE_PRICE) * 100;

                  if($change < 0)
                  {
                     echo $gainer->SYMBOL.'<br>';

                     echo $gainer->refprice.'<br>';

                     echo $gainer->CLOSE_PRICE.'<br>';

                     echo $change.'<br>';

                     echo $percentage.'<br>';

                  }

                endforeach;



                    }




}
