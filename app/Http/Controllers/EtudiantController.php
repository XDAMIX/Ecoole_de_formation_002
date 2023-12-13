<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudiantRequest;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Formation;
use App\Models\Session;
use App\Models\Information;
use App\Models\Telephone;
use RealRashid\SweetAlert\Facades\Alert;
use Dompdf\Dompdf;
use PDF;
use Carbon\Carbon;



class EtudiantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {

        $ListeEtudiants = Etudiant::leftJoin('sessions', function ($join_sessions) {
            $join_sessions->on('etudiants.session_id', '=', 'sessions.id');
        })
            ->leftJoin('formations', function ($join_formations) {
                $join_formations->on('sessions.formation_id', '=', 'formations.id');
            })
            ->get([
                'etudiants.*', 'sessions.nom as session', 'formations.titre as formation',
            ]);


        return view('admin.etudant.index', ['etudiants' => $ListeEtudiants]);
    }

    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        $session_id = $etudiant->session_id;
        $session_etudiant = Session::find($session_id);
        $formation_id = $session_etudiant->formation_id;
        $formation_etudiant = Formation::find($formation_id);
        return view('admin.etudant.voir', ['etudiant' => $etudiant, 'session' => $session_etudiant, 'formation' => $formation_etudiant]);
    }


    public function create()
    {
        $formations = Formation::all();
        $sessions = Session::all();
        return view('admin/etudant/ajouter', ['formations' => $formations, 'sessions' => $sessions]);
    }

    public function store(EtudiantRequest $request)
    {


        $etudiant = new Etudiant();

        $etudiant->sexe = $request->input('sexe');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->date_naissance = $request->input('date_naissance');
        $etudiant->lieu_naissance = $request->input('lieu_naissance');
        $etudiant->wilaya = $request->input('wilaya');
        $etudiant->profession = $request->input('profession');


        $etudiant->tel = $request->input('tel');
        $etudiant->email = $request->input('email');
        $etudiant->session_id = $request->input('session');
        $etudiant->montant = $request->input('montant');

        if ($request->hasFile('photo')) {
            $etudiant->photo = $request->photo->store('/public/images/stagiaires');
        }

        $etudiant->save();





        $nom = $request->input('nom');
        $prenom = $request->input('prenom');


        Alert::success($nom . ' ' . $prenom, ' a bien été enregistré');

        // telechargemnt de ficher pdf
        $informations = Information::all()->first();
        $telephones = Telephone::all();

        $date = date('d/m/20y');

        $session_id = $etudiant->session_id;
        $session = Session::find($session_id);
        $formation_id = $session->formation_id;
        $formation = Formation::find($formation_id);

        $formation_titre = $formation->titre;
        $session_nom = $session->nom;

        $data = [
            'photo' => $etudiant->photo,
            'sexe' => $etudiant->sexe,
            'nom' => $etudiant->nom,
            'prenom' => $etudiant->prenom,

            'date_naissance' => $etudiant->date_naissance,
            'lieu_naissance' => $etudiant->lieu_naissance,
            'wilaya' => $etudiant->wilaya,
            'profession' => $etudiant->profession,

            'tel' => $etudiant->tel,
            'email' => $etudiant->email,

            'formation' => $formation_titre,
            'session' => $session_nom,
            'montant' => $etudiant->montant,


            'informations' => $informations,
            'telephones' => $telephones,
            'date' => $date,
            // ... Autres données ...
        ];

        // $pdf = PDF::loadView('pdf',$data, compact('informations') );
        $pdf = PDF::loadView('admin.inscriptions.pdf_recu', $data);

        $titre = $etudiant->nom . '_' . $etudiant->prenom;
        // Générer le PDF à partir d'une vue
        return $pdf->download('Fiche_Inscription_Stagiaire_' . $titre . '.pdf');
    }




    public function edit($id)
    {
        $etudiant = Etudiant::find($id);
        $session_id = $etudiant->session_id;
        $session_etudiant = Session::find($session_id);
        $formation_id = $session_etudiant->formation_id;
        $formation_etudiant = Formation::find($formation_id);
        $formations = Formation::all();

        $sessions_possibles = Session::where('formation_id', $formation_id)
        ->whereNotIn('statut', ['Terminée'])
        ->get();

        return view('admin.etudant.modifier', [
            'etudiant' => $etudiant, 'formations' => $formations,
            'session_etudiant' => $session_etudiant, 'formation_etudiant' => $formation_etudiant, 'sessions' => $sessions_possibles
        ]);
    }

    public function update(EtudiantRequest $request, $id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->sexe = $request->input('sexe');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->date_naissance = $request->input('date_naissance');
        $etudiant->lieu_naissance = $request->input('lieu_naissance');
        $etudiant->wilaya = $request->input('wilaya');
        $etudiant->profession = $request->input('profession');


        $etudiant->tel = $request->input('tel');
        $etudiant->email = $request->input('email');
        $etudiant->session_id = $request->input('session');
        $etudiant->montant = $request->input('montant');

        if ($request->hasFile('photo')) {
            $etudiant->photo = $request->photo->store('/public/images/stagiaires');
        }

        $etudiant->save();

        $lenom = $etudiant->nom;
        $leprenom = $etudiant->prenom;

        Alert::success('le stagiaire : ' . $lenom . ' ' . $leprenom . ' a bien été modifié');

        return redirect('/admin/etudiant');
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect('/admin/etudiant');
    }



    public function getSessions($id_formation)
    {
        try {
            // Récupérez les professeurs en fonction du titre de la formation
            $sessionsFiltres = Session::where('formation_id', $id_formation)
            ->whereNotIn('statut', ['Terminée'])
            ->get();

            // Retournez les professeurs au format JSON
            return response()->json(['sessions' => $sessionsFiltres]);
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e);

            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    





    public function telecharger_pdf_etudiant($id)
    {
        // telechargemnt de ficher pdf
        $informations = Information::all()->first();
        $telephones = Telephone::all();

        $etudiant = Etudiant::find($id);
        $session_id = $etudiant->session_id;
        $session = Session::find($session_id);
        $formation_id = $session->formation_id;
        $formation = Formation::find($formation_id);

        $formation_titre = $formation->titre;
        $session_nom = $session->nom;

        $date = date('d/m/20y');

        $data = [
            'photo' => $etudiant->photo,
            'sexe' => $etudiant->sexe,
            'nom' => $etudiant->nom,
            'prenom' => $etudiant->prenom,

            'date_naissance' => $etudiant->date_naissance,
            'lieu_naissance' => $etudiant->lieu_naissance,
            'wilaya' => $etudiant->wilaya,
            'profession' => $etudiant->profession,

            'tel' => $etudiant->tel,
            'email' => $etudiant->email,

            'formation' => $formation_titre,
            'session' => $session_nom,
            'montant' => $etudiant->montant,


            'informations' => $informations,
            'telephones' => $telephones,
            'date' => $date,
            // ... Autres données ...
        ];



        $titre = $etudiant->nom . '_' . $etudiant->prenom;
        // Générer le PDF à partir d'une vue
        $pdf = PDF::loadView('admin.inscriptions.pdf_recu', $data);

        // Télécharger le PDF avec un nom spécifique
        return $pdf->download('Fiche_Stagiaire_' . $titre . '.pdf');
    }

    public function caisse()
    {

        $jour = Carbon::now()->toDateString();
        $moi = Carbon::now()->format('F');
        $annee = Carbon::now()->format('Y');

        $totalJour = Etudiant::whereDate('created_at', $jour)->sum('montant');
        $totalMoi = Etudiant::whereMonth('created_at', Carbon::now()->month)->sum('montant');
        $totalAnnee = Etudiant::whereYear('created_at', $annee)->sum('montant');

        return view('admin/caisse/caisse', ['totalJour' => $totalJour, 'totalMoi' => $totalMoi, 'totalAnnee' => $totalAnnee]);
    }
}
