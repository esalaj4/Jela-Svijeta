<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class MealTranslation extends Model
{
    use HasFactory;
    protected $fillable =['title'];
    public $timestamps = false;

    public function scopeFilter($query,array $filters)
    {
        if($filters['search']??false)
        {
            $query->where('title','like','%' . request('search') . '%');
        }

    }
}
