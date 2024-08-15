<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ["dining_table_id","customer_id","from_time","to_time","date"];

    public function diningTable(){
        return $this->belongsTo(DiningTable::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
