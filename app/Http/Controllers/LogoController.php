<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {

       

            $logos = Logo::all();
            return view('welcome',compact('logos'));
    }





    public function createLogo(Request $request)
    {
        $logo = new Logo();

        $logo->symbol = $request['symbol'];

        $logo->save();



        if($request['url'] !=""){
            $fileExt = $request->url->getClientOriginalExtension();
            $doi = $logo->symbol.'_'. date("Y-m-d").'_'.time().'.'.$fileExt;
            $logoName = config('app.url').'/images/'.$doi;
            $request->url->move(public_path('images'),$logoName);
            $logo->url = $logoName;
            $logo->save();
            }


       return back()->with('success', 'Logo Added');



    }



}
