<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\TypePaiement;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Paiement;
use Carbon\Carbon;
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

    $paiements_etudiant = Paiement::leftJoin('users', function ($join_users) {
        $join_users->on('paiements.user_id', '=', 'users.id');
    })
        ->where('paiements.etudiant_id', $id)
        ->get([
            'paiements.*', 'users.name as user', 'paiements.date_paiement as date', 'paiements.montant as montant',
        ]);

    $paiements = Paiement::where('etudiant_id', $id)->get();

    $total_montant = $paiements->sum('montant');
    $prix_formation = $etudiant->prix_formation;

    $le_reste = $prix_formation - $total_montant;
        

    return view('admin.paiements.voir', ['etudiant' => $etudiant, 'session' => $session_etudiant,
     'formation' => $formation_etudiant, 'paiements' => $paiements_etudiant,
     'total' => $total_montant, 'reste' => $le_reste,

    ]);
}

public function versement($id_etudiant,$id_user,$montant){

    if ($montant !== null && $montant !== '') {
        $montant_versse = $montant;
    } else {
        $montant_versse = '0';
    }

    $versement = new Paiement();
    $versement->date_paiement = Carbon::now();
    $versement->etudiant_id = $id_etudiant;
    $versement->user_id = $id_user;
    $versement->montant = $montant_versse;

    $versement->save();


    // Alert::success('Le paiement a été effectué avec succès');
        return redirect('/admin/paiement/'.$id_etudiant.'/voir');

}


}
