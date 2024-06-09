<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'publisher' => $this->publisher,
            'first_publish_date' => $this->first_publish_date,
            'ifTranslator' => $this->ifTranslator,
            'description' => $this->description,
            'isbn' => $this->isbn,
            'pages' => $this->pages,
            'ifChapters' => $this->ifChapters,
            'cover' => $this->cover,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
