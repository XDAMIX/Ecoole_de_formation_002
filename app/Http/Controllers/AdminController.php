<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Formation;
use App\Models\Session;
use App\Models\Prof;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Message;
use App\Models\Acceuil;
use App\Models\Lien;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lesinformations = Information::all();

        $acceuil = Acceuil::all();
        $liens = Lien::all();

        if ($lesinformations->isEmpty()) {

            $information = new Information();

            $information->nom = '';
            $information->adresse = '';
            $information->localisation = '';
            $information->email = '';
            $information->site_web = '';
            $information->heure_travail = '';
            $information->logo = '';
            $information->wilaya = '';
    
            $information->save();
        }
        if ($acceuil->isEmpty()) {

            $acceuil = new Acceuil();
            $acceuil->titre = 'Titre ici';
            $acceuil->sous_titre1 = 'Sous-titre ici';
            $acceuil->sous_titre2 = 'Paragraphe ici';
            $acceuil->photo = '';
    
            $acceuil->save();
        }
        if ($liens->isEmpty()) {

            $lien1 = new Lien();
            $lien1->reseau_social = 'Facebook';
            $lien1->lien = '';
            $lien1->save();

            $lien2 = new Lien();
            $lien2->reseau_social = 'Instagram';
            $lien2->lien = '';
            $lien2->save();

            $lien3 = new Lien();
            $lien3->reseau_social = 'Linkedin';
            $lien3->lien = '';
            $lien3->save();

            $lien4 = new Lien();
            $lien4->reseau_social = 'Youtube';
            $lien4->lien = '';
            $lien4->save();

            $lien5 = new Lien();
            $lien5->reseau_social = 'Tiktok';
            $lien5->lien = '';
            $lien5->save();

            $lien6 = new Lien();
            $lien6->reseau_social = 'Twitter';
            $lien6->lien = '';
            $lien6->save();
        }



        $total_formations = Formation::count();
        $total_sessions = Session::count();
        $total_profs = Prof::count();
        $total_etudiants = Etudiant::count();
        $total_inscriptions = Inscription::where('validation', false)
                                  ->where('deleted_at', null)
                                  ->count();
        $total_messages = Message::count();

        $totals = [
            'formations' => $total_formations,
            'sessions' => $total_sessions,
            'profs' => $total_profs,
            'etudiants' => $total_etudiants,
            'inscriptions' => $total_inscriptions,
            'messages' => $total_messages
        ];
        // return $totals;
        return view('admin.index',[ 'informations'=>$lesinformations,'totals'=>$totals]);
        
    }

    public function connecter()
    {
        return view('admin.connexion');
    }

    public function inscrir()
    {
        return view('auth.register');
    }
}
