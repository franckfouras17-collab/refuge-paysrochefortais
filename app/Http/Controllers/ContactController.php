<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private const DESTINATION = 'contact@refuge-paysrochefortais.fr';

    public function sendContact(Request $request)
    {
        // Honeypot anti-spam : si rempli, on fait comme si tout s'était bien passé.
        if (filled($request->input('societe'))) {
            return redirect()->route('merci');
        }

        $data = $request->validate([
            'nom' => ['required', 'string', 'max:190'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'max:5000'],
            'consentement_rgpd' => ['required'],
        ]);

        Mail::raw(
            "Nom : {$data['nom']}\nEmail : {$data['email']}\n\nMessage :\n{$data['message']}\n",
            function ($mail) use ($data) {
                $mail->to(self::DESTINATION)
                    ->subject('[Refuge Canin du Pays Rochefortais] Nouveau message de contact')
                    ->replyTo($data['email'], $data['nom']);
            }
        );

        return redirect()->route('merci');
    }

    public function sendPreRegistration(Request $request)
    {
        if (filled($request->input('societe'))) {
            return redirect()->route('merci');
        }

        $data = $request->validate([
            'email' => ['required', 'email'],
            'consentement_rgpd' => ['required'],
        ]);

        Mail::raw(
            "Email : {$data['email']}\n\nCette personne souhaite être prévenue en priorité dès l'ouverture des adoptions.\n",
            function ($mail) use ($data) {
                $mail->to(self::DESTINATION)
                    ->subject('[Refuge Canin du Pays Rochefortais] Nouvelle pré-inscription adoption')
                    ->replyTo($data['email']);
            }
        );

        return redirect()->route('merci');
    }
}
