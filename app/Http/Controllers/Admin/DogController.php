<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\DogPhoto;
use App\Support\ImageResizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::with('photos')->orderBy('position')->orderBy('name')->get();

        return view('admin.dogs.index', ['dogs' => $dogs]);
    }

    public function create()
    {
        return view('admin.dogs.form', ['dog' => new Dog()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['name']);
        $data['updated_by'] = Auth::id();

        $dog = Dog::create($data);

        $this->storePhotos($request, $dog);

        return redirect()
            ->route('admin.dogs.index')
            ->with('status', "Fiche de {$dog->name} créée.");
    }

    public function edit(Dog $dog)
    {
        return view('admin.dogs.form', ['dog' => $dog]);
    }

    public function update(Request $request, Dog $dog)
    {
        $data = $this->validated($request);
        if ($data['name'] !== $dog->name) {
            $data['slug'] = $this->uniqueSlug($data['name'], $dog->id);
        }
        $data['updated_by'] = Auth::id();

        $dog->update($data);

        $this->storePhotos($request, $dog);

        return redirect()
            ->route('admin.dogs.index')
            ->with('status', "Fiche de {$dog->name} mise à jour.");
    }

    public function destroy(Dog $dog)
    {
        foreach ($dog->photos as $photo) {
            Storage::disk('public')->delete($photo->filename);
        }
        $dog->delete();

        return redirect()
            ->route('admin.dogs.index')
            ->with('status', "Fiche de {$dog->name} supprimée.");
    }

    public function destroyPhoto(Dog $dog, DogPhoto $photo)
    {
        abort_if($photo->dog_id !== $dog->id, 404);

        Storage::disk('public')->delete($photo->filename);
        $photo->delete();

        return back()->with('status', 'Photo supprimée.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:80'],
            'description' => ['nullable', 'string', 'max:5000'],
            'age_label' => ['nullable', 'string', 'max:60'],
            'sex' => ['nullable', 'in:male,femelle'],
            'size' => ['nullable', 'in:petit,moyen,grand'],
            'status' => ['required', 'in:disponible,reserve,adopte'],
            'position' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    private function storePhotos(Request $request, Dog $dog): void
    {
        if (! $request->hasFile('photos')) {
            return;
        }

        $request->validate([
            'photos.*' => ['image', 'max:4096'],
        ]);

        $nextPosition = $dog->photos()->max('position') + 1;

        // Les fiches chien sont affichées en cartes ~800x520 (adoption) et
        // en vignettes plus petites (admin) : 1600x1600 est largement
        // suffisant et évite de stocker des photos de téléphone brutes.
        foreach ($request->file('photos') as $file) {
            $path = ImageResizer::resizeAndStore($file, 'public', 'dogs', 1600, 1600);
            DogPhoto::create([
                'dog_id' => $dog->id,
                'filename' => $path,
                'position' => $nextPosition++,
            ]);
        }
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;

        while (
            Dog::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()
        ) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}
