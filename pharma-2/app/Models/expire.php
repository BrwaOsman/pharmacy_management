<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expire extends Model
{
    protected $table = "expires";
    protected $fillable = [
        'id',
        'barcode',
        'expire_date',
       
        
    ];
    use HasFactory;
}
