<?php

namespace App\Models;

use Database\Factories\MealFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $fillable = ["name", "price","description","available_quantity","discount"];

    protected static function newFactory()
    {
        return MealFactory::new();
    }
}
