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
        $listeinformations = Information::all();

        $total_formations = Formation::count();
        $total_sessions = Session::count();
        $total_profs = Prof::count();
        $total_etudiants = Etudiant::count();
        $total_inscriptions = Inscription::where('contact', false)
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
        return view('admin.index',[ 'informations'=>$listeinformations,'totals'=>$totals]);
        
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
