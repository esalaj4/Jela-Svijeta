<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Translatable;

    protected $table = 'categories';

    protected $primaryKey='id';

    protected $fillable=['slug'];

    protected $translatedAttributes =['title'];
   




    public function meals()
    {
        return $this->hasMany(Meal::class);
    } 

    

 
}
