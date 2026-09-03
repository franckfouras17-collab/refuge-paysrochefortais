<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['dog_id', 'filename', 'position'])]
class DogPhoto extends Model
{
    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
}
