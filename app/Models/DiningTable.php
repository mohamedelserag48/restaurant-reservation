<?php

namespace App\Models;

use Database\Factories\DiningTableFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiningTable extends Model
{
    use HasFactory;
    protected $fillable = ["capacity"];
    protected static function newFactory()
    {
        return DiningTableFactory::new();
    }


}
