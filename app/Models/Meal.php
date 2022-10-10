<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Description;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Meal extends Model
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;
    protected $table = 'meals';
    protected $primaryKey='id';
    protected $fillable=['slug'];
    protected $translatedAttributes = ['title'];

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
    

    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function scopeFilter($query,array $filters)
    {
        
        if($filters['search']??false)
        {
            

            $query->whereTranslationLike('title','%' . request('search') . '%')
            ->get();
            //dd($meals);
        }

        

    

        
    }


}
