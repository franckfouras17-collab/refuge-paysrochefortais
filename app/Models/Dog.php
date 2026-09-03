<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'slug', 'description', 'age_label', 'sex', 'size', 'status', 'position', 'updated_by'])]
class Dog extends Model
{
    public function photos()
    {
        return $this->hasMany(DogPhoto::class)->orderBy('position');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'disponible');
    }
}
