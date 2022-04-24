<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ADController;
use App\Http\Controllers\API\LogoController;
use App\Http\Controllers\API\PriceController;
use App\Http\Controllers\API\BrokerController;
use App\Http\Controllers\API\PerformanceController;
use App\Http\Controllers\API\SecurityController;
use App\Http\Controllers\API\SnapshotController;
use App\Http\Controllers\API\NewAccountController;





// Price List
Route::get('price_update', [PriceController::class, 'prices_vfd']);
Route::get('trades/{security}', [PriceController::class, 'trades']);
Route::get('price_list', [PriceController::class, 'price_list']);
Route::get('priceList/{symbol}', [PriceController::class, 'priceList']);
Route::get('priceperformance/{symbol}', [PriceController::class, 'priceperformance']);



// Securities
Route::get('security/{symbol}', [SecurityController::class, 'security']);
Route::get('securities', [SecurityController::class, 'securities']);


// Securities Logos
Route::get('security_logo/{symbol}', [LogoController::class, 'security_logo']);
Route::get('logos', [LogoController::class, 'logos']);



// Brokers
Route::get('brokers', [BrokerController::class, 'brokers']);
Route::get('broker/{sn}', [BrokerController::class, 'broker']);




// Gainers AND Losers
Route::get('losers', [ADController::class, 'losers']);
Route::get('gainers', [ADController::class, 'gainers']);





// Investors Account
Route::get('accounts', [NewAccountController::class, 'accounts']);
Route::get('account/{ACCOUNTNUMBER}', [NewAccountController::class, 'account']);



// MarketSnapShot
Route::get('snapshot', [SnapshotController::class, 'snapshot']);
Route::get('account/{ACCOUNTNUMBER}', [NewAccountController::class, 'account']);
Route::get('trade_history', [SnapshotController::class, 'trade_history']);
Route::get('security_trade_history/{symbol}', [SnapshotController::class, 'security_trade_history']);





// Securities
//Route::get('security/{symbol}', [SecurityController::class, 'security']);
Route::get('marketindex', [SecurityController::class, 'marketindex']);



// Security Performannce
Route::get('security_performance/{symbol}', [PerformanceController::class, 'security_performance']);

















// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
