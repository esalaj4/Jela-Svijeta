<?php

namespace App\Http\Resources;

use App\Http\Resources\TagResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\IngredientResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Meals extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        $date = $request->get('diff_time');
       
        if ($date && $this->deleted_at > $date) {
            $status = 'deleted';
        } elseif ($date && $this->updated_at >= $date) {
            $status = 'modified';
        } else {
            $status = 'created';
        }

        return [
            'id'          => $this->id,
            'title'       => $this->translate($request->get('lang'))->title,
            'status'      => $status,
            'ingredients' => IngredientResource::collection($this->whenLoaded('ingredient')),
            'category'    => new CategoryResource($this->whenLoaded('category')),
            'tag'         => TagResource::collection($this->whenLoaded('tag')),
            'description' => new DescriptionResource($this->description),
        ];
    }

}
