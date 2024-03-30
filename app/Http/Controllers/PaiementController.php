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

use PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;
use App\Models\Telephone;
use App\Models\Information;

use Illuminate\Support\Facades\DB;

use RealRashid\SweetAlert\Facades\Alert;

class PaiementController extends Controller
{
public function index(){
    $etudiants =  Etudiant::leftJoin('sessions', function ($join_sessions) {
        $join_sessions->on('etudiants.session_id', '=', 'sessions.id');
    })
    ->leftJoin('formations', function ($join_formations) {
        $join_formations->on('sessions.formation_id', '=', 'formations.id');
    })
    ->orderBy('etudiants.id', 'DESC')
    ->get([
        'etudiants.*', 'sessions.nom as session', 'formations.titre as formation', 'etudiants.id as id',
    ]);
    

    $paiements_etudiants = DB::table('etudiants')
    ->leftJoin('paiements', 'etudiants.id', '=', 'paiements.etudiant_id')
    ->select(
        'etudiants.id',
        'etudiants.prix_formation as prix_formation',
        DB::raw('SUM(paiements.montant) as total_paiements')
    )
    ->groupBy('etudiants.id', 'etudiants.prix_formation')
    ->get();
    


    return view('admin.paiements.index',[
        'paiements_etudiants'=>$paiements_etudiants ,
         'etudiants'=>$etudiants
        ]);
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
public function show_inscription($id){
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


    // --------------genrer le recu pdf --------------------

    $titre = 'Versement';

    // ... Validation des données et téléchargements de fichiers ...
    $informations = Information::all()->first();
    $telephones = Telephone::all();
    $date = date('d/m/20y');
    $etudiants = Etudiant::find($id_etudiant);

   
    $session_id = $etudiants->session_id;
    $session = Session::find($session_id);
    $formation_id = $session->formation_id;
    $formation = Formation::find($formation_id);

    $nom = $etudiants->nom;
    $prenom = $etudiants->prenom;

    $code = $etudiants->code;
    $formation = $formation->titre;
    $session = $session->nom;
    $montant = $montant_versse;





    $data = [

        'nom' => $nom,
        'prenom' =>  $prenom,
        'id' =>  $code,
        'titre' =>  $titre,
        'montant' => $montant,
        'formation' => $formation,
        'session' => $session,
        'informations' => $informations,
        'telephones' => $telephones,
        'date' => $date,
        
    ];
            // Générer le PDF à partir d'une vue
            $pdf = PDF::loadView('admin\paiements\recu_frais', $data);
            $pdf->setPaper('A4', 'portrait');
            $pdfOutput = $pdf->output();
            // Générer le PDF et définir l'entête de la réponse
            $response = Response::make($pdfOutput, 200, [
                'Content-Type' => 'application/pdf',
                // 'Content-Disposition' => 'inline;filename="'.$lenom.'_'.$leprenom.'_attistation_'.$formationname.'_'.$date.'.pdf"', // L'option "inline" indique au navigateur d'ouvrir le fichier PDF directement.
                'Content-Disposition' => 'attachment; filename="' . 'reçu_de_versement_' . $etudiants->nom . '_' . $etudiants->prenom . '_' . $date . '.pdf"', // L'option "attachment" indique au navigateur de télécharger le fichier.
                'Content-Length' => strlen($pdfOutput),
    
            ]);
            return $response;



    // --------------------------------------------------------


    // Alert::success('Le paiement a été effectué avec succès');
        // return redirect('/admin/paiement/'.$id_etudiant.'/voir');

}
public function facture($id)
{

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
        

    // ----


    $nom = $etudiant->nom;
    $prenom = $etudiant->prenom;
    $id = $etudiant->id;
    $code = $etudiant->code;
    $formation = $formation_etudiant->titre;
    $session = $session_etudiant->nom;
    $session_debut_session = $session_etudiant->date_debut;
    $titre = $formation_etudiant->titre;
    //   $montant = $le_paiement->montant;


   

    // ... Validation des données et téléchargements de fichiers ...
    $informations = Information::all()->first();
    $telephones = Telephone::all();
    $date = date('d/m/20y');

    // somme des montants paye

    $totalMontant = Paiement::where('etudiant_id', $id)->sum('montant');

    $data = [
        'paiements' => $paiements_etudiant,
        // 'user_name' => $user_name,
        'nom' => $nom,
        'prenom' =>  $prenom,
        'id' =>  $code,
        // 'id' =>  $id,
        'titre' =>  $titre,
        'totalMontant' => $totalMontant,
        'formation' => $formation,
        'session' => $session,
        // 'date_debut_session' => $session_debut_session,
        'informations' => $informations,
        'telephones' => $telephones,
        'date' => $date,
        // ... Autres données ...
    ];




    // Générer le PDF à partir d'une vue
    $pdf = PDF::loadView('admin\paiements\recu_totale', $data);
    $pdf->setPaper('A4', 'portrait');
    $pdfOutput = $pdf->output();
    // Générer le PDF et définir l'entête de la réponse
    $response = Response::make($pdfOutput, 200, [
        'Content-Type' => 'application/pdf',
        // 'Content-Disposition' => 'inline;filename="'.$lenom.'_'.$leprenom.'_attistation_'.$formationname.'_'.$date.'.pdf"', // L'option "inline" indique au navigateur d'ouvrir le fichier PDF directement.
        'Content-Disposition' => 'attachment; filename="' . 'Facture_' . $etudiant->nom . '_' . $etudiant->prenom . '_' . $date . '.pdf"', // L'option "attachment" indique au navigateur de télécharger le fichier.
        'Content-Length' => strlen($pdfOutput),

    ]);
    return $response;



    // return redirect('/admin/paiement/' . $id . '/voir');
}




}
