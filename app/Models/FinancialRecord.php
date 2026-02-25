<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
        protected $fillable = [
        'user_id',
        'description',
        'amount',
        'type',
        'date'
    ];
}
