<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","reservation_id","customer_id","dining_table_id", "total","paid","date"];

    protected $casts = ["date" => "datetime"];

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function diningtable(){
        return $this->belongsTo(Diningtable::class);
    }
}
