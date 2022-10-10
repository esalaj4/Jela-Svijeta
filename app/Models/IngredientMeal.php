<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientMeal extends Model
{
    use HasFactory;
    protected $fillable=['ingredients_id','meal_id'];
}
