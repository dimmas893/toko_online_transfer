<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
 public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {
                return [
                    'user' => [
                        'name' => $data->user->name
                    ],
                    'rating' => $data->rating,
                    'comment' => $data->comment,
                    'time' => $data->created_at->diffForHumans()
                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
