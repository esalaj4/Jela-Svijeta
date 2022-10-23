<?php

namespace App\Http\Controllers;

use Locale;
use App\Models\Tag;
use App\Models\Meal;
use App\Models\Ingredients;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\Meals;
use App\Models\MealTranslation;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MealsRequest;
use Illuminate\Support\Facades\App;
use App\Http\Resources\MealsCollection;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Validator;

class MealController extends Controller
{
    public function filter(MealsRequest $request)
    {
       $validated=$request->validated();
       $meal_query=Meal::with(['tags','ingredients','category']);
       $per_page=(int)$request->get('per_page');
       $lang=$request->get('lang');
       $with = $request->get('with');
       $categoryId=$request->get('categories');
       $diff_time = $request->get('diff_time');

        if ($categoryId == "null") {
            $meal_query->whereNull('category_id');
        } elseif ($categoryId == "!null") {
            $meal_query->whereNotNull('category_id');
        } elseif ($categoryId) {
            $meal_query->where('category_id', $categoryId);
        }

        if($request->tags) {
            $tags = explode(',',$request->tags);
            $meal_query->whereHas('tags',function($query) use($request)
            {
                $tags = explode(',',$request->tags);
                $query->whereIn('tag_id',$tags);
            });
        }

        if($with) {
            $withData = explode(',', $with);
            $meal_query->with($withData);
        }

        if ($diff_time) {
            $meal_query->where('created_at', '>=', $diff_time);
            $meal_query->where('updated_at', '>=', $diff_time);
            $meal_query->where('deleted_at', '>=', $diff_time);
            $meal_query->withTrashed();
        } 
        
        if ($per_page) {
        return Meals::collection($meal_query->paginate($per_page));
        } else {
            return Meals::collection($meal_query->get());
        }
    }
}
