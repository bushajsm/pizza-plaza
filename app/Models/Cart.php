<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pizza;

class Cart extends Model
{
    use HasFactory;
    public $table='carts';
    protected $fillable = ['pizza_id','quantity','price','user_id'];
    
    /**
     * Realtionship with pizza
     */
    public function pizza(){
        return $this->hasMany(Pizza::class,'id','pizza_id');
    }
                
}
