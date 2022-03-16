<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sold extends Model
{
    use HasFactory;
    protected $table = "solds";
    protected $fillable = [
        'id',
        'user_id',
        'stock_id',
        'clean',
        'price_at',
       'selling_at',
        'piece',
   
      
    ];
 public function stock(){
        return $this->hasOne('App\Models\stock' , 'id' , 'stock_id');
    }
    public function casher(){
        return $this->hasOne('App\Models\User' , 'id' , 'user_id');
    }
   
}
