<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MAS;

class MAS extends Model
{


     use HasFactory;
    protected $table = 'market_activity_sheet';
}
