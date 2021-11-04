<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'isbn' => $this->isbn,
            'pages' => $this->pages,
            'about' => $this->about,
            'author' => $this->getAuthor->name.' '.$this->getAuthor->surname,
            'photo' => $this->getMainPhoto->first()
        ];
    }
}
