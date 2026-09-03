<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentItem;
use App\Support\ImageResizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        $items = ContentItem::orderBy('page')->orderBy('content_key')->get()->groupBy('page');

        return view('admin.content.index', ['itemsByPage' => $items]);
    }

    public function edit(ContentItem $content)
    {
        return view('admin.content.edit', ['item' => $content]);
    }

    public function update(Request $request, ContentItem $content)
    {
        if ($content->type === 'image') {
            $request->validate([
                'image' => ['nullable', 'image', 'max:4096'],
            ]);

            if ($request->hasFile('image')) {
                if ($content->value) {
                    Storage::disk('public')->delete($content->value);
                }
                [$maxWidth, $maxHeight] = $this->maxDimensionsFor($content->content_key);
                $content->value = ImageResizer::resizeAndStore($request->file('image'), 'public', 'content', $maxWidth, $maxHeight);
            }
        } else {
            $request->validate([
                'value' => ['nullable', 'string', 'max:5000'],
            ]);
            $content->value = $request->input('value');
        }

        $content->updated_by = Auth::id();
        $content->save();

        Cache::forget('content_items.values');

        return redirect()
            ->route('admin.content.index')
            ->with('status', "« {$content->label} » mis à jour.");
    }

    /**
     * Le gabarit de redimensionnement dépend de l'emplacement de l'image
     * sur le site (encodé dans le content_key, ex. "home.hero.image") :
     * une bannière pleine largeur n'a pas besoin de la même taille qu'une
     * illustration de section.
     */
    private function maxDimensionsFor(string $contentKey): array
    {
        if (str_contains($contentKey, 'hero')) {
            return [2400, 1350];
        }

        return [1600, 1600];
    }
}
