<?php

namespace App\Http\Controllers;

use App\Models\Dog;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function projet()
    {
        return view('pages.le-projet');
    }

    public function adoption()
    {
        return view('pages.adoption', [
            'dogs' => Dog::available()->with('photos')->orderBy('position')->get(),
        ]);
    }

    public function capaciteExtensions()
    {
        return view('pages.capacite-extensions');
    }

    public function financement()
    {
        return view('pages.financement');
    }

    public function budgetCalendrier()
    {
        return view('pages.budget-calendrier');
    }

    public function nousSoutenir()
    {
        return view('pages.nous-soutenir');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function mentionsLegales()
    {
        return view('pages.mentions-legales');
    }

    public function confidentialite()
    {
        return view('pages.confidentialite');
    }

    public function merci()
    {
        return view('pages.merci');
    }
}
