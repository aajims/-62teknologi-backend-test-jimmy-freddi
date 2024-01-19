<?php
 
namespace App\Http\Resources;
 
use Illuminate\Http\Resources\Json\JsonResource;
 
class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'coordinate' => [
                'latitude' => $this->latitude,
                'longtitude' => $this->longtitude,
            ],
            'display_phone' => $this->display_phone,
            'name' => $this->name,
            'alias' => $this->alias,
            'location' => $this->location,
            'phone' => $this->phone,
            'categorie' => [
                'title' => $this->title,
                'alias' => $this->alias,
            ],
            'photo' => [
                'url' => $this->url
            ]
            // 'photos' => [
            //     'url' => $this->url
            // ],
            // 'photo_details' => [
            //     'photo_id' => $this->photo_id,
            //     'url' => $this->url,
            //     'caption' => $this->caption,
            //     'width' => $this->width,
            //     'height' => $this->height,
            //     'is_user_submitted' => $this->is_user_submitted,
            //     'user_id' => $this->user_id,
            //     'label' => $this->label,
            // ]
        ];
    }
}