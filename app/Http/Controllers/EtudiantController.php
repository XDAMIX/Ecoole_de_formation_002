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

    
    
    public function index() {
        
        $ListeEtudiants = Etudiant::all();

        return view('admin/etudant/index',['etudiants'=>$ListeEtudiants]);
    }

    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        return view('admin.etudant.voir', ['etudiant' => $etudiant]);
    }
    
    
    public function create() {
        $formations = Formation::all();
        $sessions = Session::all();
        return view('admin/etudant/ajouter',['formations' => $formations,'sessions' => $sessions]);
    }
    
    public function store(EtudiantRequest $request) {
        
        
        $nvEtudiant = new Etudiant();
        
        $nvEtudiant->sexe = $request->input('sexe');
        $nvEtudiant->nom = $request->input('nom');
        $nvEtudiant->prenom = $request->input('prenom');
        
        $nvEtudiant->age = $request->input('age');
        $nvEtudiant->wilaya = $request->input('wilaya');
        
        $nvEtudiant->email = $request->input('email');
        $nvEtudiant->tel = $request->input('tel');
        $nvEtudiant->profession = $request->input('profession');
        
        $nvEtudiant->formation = $request->input('formation');
        $nvEtudiant->session = $request->input('session');
        $nvEtudiant->montant = $request->input('montant');
        $nvEtudiant->contact = (true);


        
        
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        
        $nvEtudiant->save();
        
        Alert::success( $nom.' '.$prenom,' a bien été enregistré');
        
        // telechargemnt de ficher pdf
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        
        $date = date('d/m/20y');
        
        $data = [
            'sexe' => $request->input('sexe'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'age' => $request->input('age'),
            'wilaya' => $request->input('wilaya'),
            'profession' => $request->input('profession'),
            'tel' => $request->input('tel'),
            'email' => $request->input('email'),
            
            'formation' => $request->input('formation'),
            'session' => $request->input('session'),
            'montant' => $request->input('montant'),
            
            
            'informations' => $informations,
            'telephones' => $telephones,
            'date' => $date,
            // ... Autres données ...
        ];
        
        // $pdf = PDF::loadView('pdf',$data, compact('informations') );
        $pdf = PDF::loadView('admin.inscriptions.pdf_recu', $data);
        
        $titre = $nvEtudiant->nom .'_'. $nvEtudiant->prenom;
        // Générer le PDF à partir d'une vue
        return $pdf->download($titre.'.pdf');
    
    }
    
    public function edit($id) {
        $etudiant = Etudiant::find($id);
        $formations = Formation::all();
        $sessions = Session::all();
        return view('admin.etudant.modifier',['etudiant' => $etudiant, 'formations' => $formations, 'sessions' => $sessions]);
    }
    
    public function update(EtudiantRequest $request,$id) {
        $etudiant = Etudiant::find($id);
        $etudiant->sexe = $request->input('sexe');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->age = $request->input('age');
        $etudiant->wilaya = $request->input('wilaya');
        
        $etudiant->email = $request->input('email');
        $etudiant->tel = $request->input('tel');
        $etudiant->profession = $request->input('profession');
        $etudiant->montant = $request->input('montant');
        
        // if($request->hasFile('photo')){
        //     $formation->photo = $request->photo->store('/public/images/formations');
        // }

        $etudiant->save();
        return redirect('/admin/etudiant');
        
    }
    
    public function destroy($id) {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();     
        return redirect('/admin/etudiant');
    }
    
    
    public function getSessions($titre_formation)
    {
        try {
            // Récupérez les professeurs en fonction du titre de la formation
            $sessionsFiltres = Session::where('formation', $titre_formation)->get();
            
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
        $etudiant = Etudiant::find($id);
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        
        $data = [
            'sexe' => $etudiant->sexe,
            'nom' => $etudiant->nom,
            'prenom' => $etudiant->prenom,
            'age' => $etudiant->age,
            'wilaya' => $etudiant->wilaya,
            'profession' => $etudiant->profession,
            'tel' => $etudiant->tel,
            'email' => $etudiant->email,
            'formation' => $etudiant->formation,
            'session' => $etudiant->session,
            'montant' => $etudiant->montant,
            'informations' => $informations,
            'telephones' => $telephones,
            'date' => $etudiant->created_at,
        ];
        
        $titre = $etudiant->nom .'_'. $etudiant->prenom;
        // Générer le PDF à partir d'une vue
        $pdf = PDF::loadView('admin.inscriptions.pdf_recu', $data);
        
        // Télécharger le PDF avec un nom spécifique
        return $pdf->download('Fiche _etudiant_'.$titre.'.pdf');
        
    }
    
    public function caisse() {

        $jour = Carbon::now()->toDateString();
        $moi = Carbon::now()->format('F');
        $annee = Carbon::now()->format('Y');
        
        $totalJour = Etudiant::whereDate('created_at', $jour)->sum('montant');
        $totalMoi = Etudiant::whereMonth('created_at', Carbon::now()->month)->sum('montant');
        $totalAnnee = Etudiant::whereYear('created_at', $annee)->sum('montant');
    
        return view('admin/caisse/caisse',['totalJour'=>$totalJour,'totalMoi'=>$totalMoi,'totalAnnee'=>$totalAnnee]);
    }



}
