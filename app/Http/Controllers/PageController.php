<?php

namespace App\Http\Controllers;

use App\Models\Dog;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function adoption()
    {
        return view('pages.adoption', [
            'dogs' => Dog::available()->with('photos')->orderBy('position')->get(),
        ]);
    }
}
