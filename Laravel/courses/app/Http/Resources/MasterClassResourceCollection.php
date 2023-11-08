<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MasterClassResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($masterClass) {
                return [
                    'id' => $masterClass->id,
                    'course' => $masterClass->course,
                    'description' => $masterClass->description,
                    'number' => $masterClass->number,
                    'image' => $masterClass->image,
                    'rubric' => $masterClass->rubric,
                ];
            })
            ->all(),
        ];
    }
}
