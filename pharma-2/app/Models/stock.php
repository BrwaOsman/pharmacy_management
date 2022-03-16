<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;
    protected $table = "stocks";
    protected $fillable = [
        'barcode',
        'name',
        'supplier_id',
        'count',
        'price',
        'selling',
        'expire_date',
        'is_debt',
        'type',
    ];

    public function one_supplier(){
        return $this->hasOne('App\Models\supplier' , 'id' , 'supplier_id');
    }
    public function expire(){
        return $this->hasOne('App\Models\expire' , 'barcode' , 'barcode');
    }
}
