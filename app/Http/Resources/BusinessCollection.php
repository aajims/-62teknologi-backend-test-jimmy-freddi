<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BusinessCollection extends ResourceCollection
{
    public function toArray(Request $request)
    {
        dd($request);
        // return parent::toArray($request);
        return [
            'data' => $this->collection->toArray($request)
        ];
    }
}