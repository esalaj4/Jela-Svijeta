<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;
    use Translatable;

   protected $fillable = ['meal_id'];
   public $timestamps = false;
    public $translatedAttributes=['description'];

    public function meal()
    {  
        return $this->belongsTo(Meal::class);
    }
}
