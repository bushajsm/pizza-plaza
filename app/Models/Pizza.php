<?php

namespace App\Models;
use App\Models\Extra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','description','image_name', 'price','sale_price'];

    public function extras(){
        return $this->belongsToMany(Extra::class);
    }
}
