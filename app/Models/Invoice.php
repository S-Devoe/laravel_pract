<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    
    use HasFactory, HasUlids;

    public function Customer(){
        return $this->belongsTo(Customer::class);
    }
}
