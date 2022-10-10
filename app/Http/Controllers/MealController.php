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
use Illuminate\Support\Facades\App;
use App\Http\Resources\MealsCollection;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Validator;

class MealController extends Controller
{

    public function filter(Request $request)
    {
          $validator = Validator::make(
            $request->all(),
            [
                'tag'=>'integer',
                'category'=>'nullable|integer',
                'lang'=>'required',
                'per_page'=>'integer|min:1',
                'page'=>'integer|min:1',
                'diff_time'=>'date'

               
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
 
 

       $meal_query=Meal::with(['tag','ingredients','category']);

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

       if($request->tag)
       {
        $meal_query->whereHas('tag',function($query) use($request)
        {
            $query->whereTranslationLike('tag_id',$request->tag);
        });
       }



       if ($with) {
        $withData = explode(',', $with);
        $meal_query->with($withData);
    }


    if ($diff_time) {
        $meal_query->where('created_at', '>=', $diff_time);
        $meal_query->where('updated_at', '>=', $diff_time);
        $meal_query->withTrashed();

    } 

    
        if ($per_page) {
        return new MealsCollection($meal_query->paginate($per_page));
        } else {

        return new MealsCollection(($meal_query));
        } 
        
    }



    public function getTags($meal_id)
    {
        return Meal::find($meal_id)->tags;
    }

    public function getMeals($tag_id)
    {
        return Tag::find($tag_id)->tags;
    }

 /*    public function create()
    {
        $meals=Meal::all();
        $tags=Tag::all();
       

        foreach($meals as $meal)
        {
            $tagNumber= random_int ( 1,3);
            $ingredientNumber=random_int ( 1,3);
            $tag = Tag::inRandomOrder()->take($tagNumber)->first();
            $ingredient = Ingredients::inRandomOrder()->take($ingredientNumber)->first();
            $meal->tags()->attach($tag->id);
            $meal->ingredients()->attach($ingredient->id);
            
            $meal->save();

        }

    }  */

    public function homePage()
    {
        
    
    
        return view('meals',[
           'meals' => Meal::latest()->filter(request(['search']))->paginate(10)
       ]); 
    }

    


    public function index(Request $request,$locale)
    {
      
        
       
        app::setLocale($locale);
        //$meals=Meal::Paginate(4);
    
    
        return view('meals',[
            'meals' => Meal::latest()->filter(request(['search']))->paginate(10)
       ]); 

       
    }

  

    

}
