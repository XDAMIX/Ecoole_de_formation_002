<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\TypePaiement;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Inscription;
use RealRashid\SweetAlert\Facades\Alert;

class PaiementController extends Controller
{
public function index(){
    $paiements =  TypePaiement::all();
    $etudiants =  Etudiant::leftJoin('sessions', function ($join_sessions) {
        $join_sessions->on('etudiants.session_id', '=', 'sessions.id');
    })
        ->leftJoin('formations', function ($join_formations) {
            $join_formations->on('sessions.formation_id', '=', 'formations.id');
        })
        ->orderBy('etudiants.id', 'DESC')
        ->get([
            'etudiants.*', 'sessions.nom as session', 'formations.titre as formation',
        ]);
    return view('admin.paiements.index',['paiments'=>$paiements , 'etudiants'=>$etudiants]);
}

public function show($id){
    $etudiant = Etudiant::find($id);
    $session_id = $etudiant->session_id;
    $session_etudiant = Session::find($session_id);
    $formation_id = $session_etudiant->formation_id;
    $formation_etudiant = Formation::find($formation_id);
    return view('admin.paiements.voir', ['etudiant' => $etudiant, 'session' => $session_etudiant, 'formation' => $formation_etudiant]);
}


}
