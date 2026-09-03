<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

#[Fillable(['content_key', 'page', 'label', 'type', 'value', 'updated_by'])]
class ContentItem extends Model
{
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Récupère la valeur d'un contenu par sa clé, avec une valeur de
     * repli si le contenu n'existe pas encore en base (permet d'ajouter
     * progressivement des blocs de contenu éditables sans tout casser).
     */
    public static function get(string $key, string $fallback = ''): string
    {
        $values = Cache::remember('content_items.values', 60, function () {
            return self::pluck('value', 'content_key')->toArray();
        });

        return $values[$key] ?? $fallback;
    }
}
