<?php

namespace Mates\Login\Http\resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
{
    public function toArray($request) {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "surname" => $this->surname,
            "email" => $this->email,
            "registered_at" => Carbon::parse($this->created_at)->format('d.m.Y')
        ];
    }
}
