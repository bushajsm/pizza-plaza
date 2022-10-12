<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pizza;

class Extra extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'price','isChoosable'
    ];
    //many to many relatioship pizzas-extras
    public function pizzas(){
        return $this->belongsToMany(Pizza::class);
    }
}
