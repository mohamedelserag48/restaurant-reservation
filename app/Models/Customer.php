<?php

namespace App\Models;

use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ["name","phone"];

    public function orders(){
        return $this->hasManyThrough(Order::class, Reservation::class);
    }

    public function Reservations(){
        return $this->hasMany(Reservation::class);
    }

    protected static function newFactory()
    {
        return CustomerFactory::new();
    }
}
