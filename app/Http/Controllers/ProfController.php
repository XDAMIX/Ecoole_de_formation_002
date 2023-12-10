<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Formation;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Requests\ProfRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Prof;
use Dompdf\Dompdf;
use PDF;

class ProfController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }

    public function index() {
        $ListeProfs = Prof::where('nom', '!=', 'NEW_RECORD')
                  ->where('prenom', '!=', 'NEW_RECORD')
                  ->get();

        return view('admin/prof/index',['profs'=>$ListeProfs]);

    }

    public function show($id)
    {
        $prof = Prof::find($id);
        $id = $prof->id;
        $cours = Cour::leftJoin('formations', 'cours.formation_id', '=', 'formations.id')
        ->leftJoin('profs', 'cours.prof_id', '=', 'profs.id')
        ->where('cours.prof_id', $id)
        ->select('cours.*', 'formations.*', 'profs.*', 'profs.id as id_prof', 'formations.id as id_formation', 'formations.titre as titre_formation', 'cours.id as id_cour')
        ->get();
        return view('admin/prof/voir', ['prof' => $prof, 'cours' => $cours]);
    }


    public function telecharger_pdf_prof($id)
    {
        $informations = Information::all()->first();
        $prof = Prof::find($id);
        $id = $prof->id;
        $cours = Cour::leftJoin('formations', 'cours.formation_id', '=', 'formations.id')
        ->leftJoin('profs', 'cours.prof_id', '=', 'profs.id')
        ->where('cours.prof_id', $id)
        ->select('cours.*', 'formations.*', 'profs.*', 'profs.id as id_prof', 'formations.id as id_formation', 'formations.titre as titre_formation', 'cours.id as id_cour')
        ->get();

        $data = [
            'sexe' => $prof->sexe,
            'nom' => $prof->nom,
            'prenom' => $prof->prenom,
            'tel' => $prof->tel,
            'email' => $prof->email,
            'wilaya' => $prof->wilaya,
            'adresse' => $prof->adresse,
            'diplome' => $prof->diplome,
            'date' => $prof->created_at,

            'cours' => $cours,
            'informations' => $informations,
        ];

        $titre = $prof->nom .'_'. $prof->prenom;
        // Générer le PDF à partir d'une vue
        $pdf = PDF::loadView('admin.prof.pdf', $data);

        // Télécharger le PDF avec un nom spécifique
        return $pdf->download('Professeur_'.$titre.'.pdf');

    }
    
    public function create() {
        $listeformations = Formation::all();
        $Prof = Prof::where('nom', 'NEW_RECORD')->where('prenom', 'NEW_RECORD')->get()->last();
        if ($Prof !== null && $Prof->count() > 0) {
            $lastProf = $Prof;
            $id_prof = $lastProf->id;
            Cour::where('prof_id', $id_prof)->delete();
        }
        else {
            $nvProf = new Prof();
            $nvProf->nom = 'NEW_RECORD';
            $nvProf->prenom = 'NEW_RECORD';
            $nvProf->sexe = 'NEW_RECORD';
            $nvProf->save();
    
            $lastProf = Prof::latest()->first();
        }


        return view('admin.prof.ajouter',['formations' => $listeformations, 'prof' => $lastProf]);
    }

    
    public function store(ProfRequest $request,$id) {
       

        $Prof = Prof::find($id);

        $Prof->sexe = $request->input('sexe');
        $Prof->nom = $request->input('nom');
        $Prof->prenom = $request->input('prenom');
        $Prof->date_naissance = $request->input('date_naissance');
        $Prof->lieu_naissance = $request->input('lieu_naissance');
        
        $Prof->wilaya = $request->input('wilaya');
        $Prof->adresse = $request->input('adresse');
        $Prof->email = $request->input('email');
        $Prof->tel = $request->input('tel');
        $Prof->diplome = $request->input('diplome');
      
       
        if($request->hasFile('photo')){
            $Prof->photo = $request->photo->store('/public/images/professeurs');
        }


        $nom = $request->input('nom');
        $prenom = $request->input('prenom');

        $Prof->save();
        
        $nom = $Prof->nom;
        $prenom = $Prof->prenom;
        if ($Prof->sexe == 'H'){
            $titre = 'Mr';
        };
        if ($Prof->sexe == 'F'){
            $titre = 'Mme';
        };
        Alert::success( $titre.' : '.$nom.' '.$prenom,' a bien été enregistrer');

        return redirect('/admin/prof');
    
    }

    public function edit($id) {
        $prof = Prof::find($id);
        $cours = Cour::leftJoin('formations', 'cours.formation_id', '=', 'formations.id')
        ->leftJoin('profs', 'cours.prof_id', '=', 'profs.id')
        ->where('cours.prof_id', $prof)
        ->select('cours.*', 'formations.*', 'profs.*', 'profs.id as id_prof', 'formations.id as id_formation', 'formations.titre as titre_formation', 'cours.id as id_cour')
        ->get();
        $listeformations = Formation::all();

        return view('admin/prof/modifier',['prof' => $prof,'cours' => $cours,'formations' => $listeformations]);
    }

    public function update(ProfRequest $request,$id) {

        $Prof = Prof::find($id);

        $Prof->sexe = $request->input('sexe');
        $Prof->nom = $request->input('nom');
        $Prof->prenom = $request->input('prenom');
        $Prof->date_naissance = $request->input('date_naissance');
        $Prof->lieu_naissance = $request->input('lieu_naissance');
        
        $Prof->wilaya = $request->input('wilaya');
        $Prof->adresse = $request->input('adresse');
        $Prof->email = $request->input('email');
        $Prof->tel = $request->input('tel');
        $Prof->diplome = $request->input('diplome');
      
       
        if($request->hasFile('photo')){
            $Prof->photo = $request->photo->store('/public/images/professeurs');
        }


        $nom = $request->input('nom');
        $prenom = $request->input('prenom');

        $Prof->save();
        
        $nom = $Prof->nom;
        $prenom = $Prof->prenom;
        if ($Prof->sexe == 'H'){
            $titre = 'Mr';
        };
        if ($Prof->sexe == 'F'){
            $titre = 'Mme';
        };
        Alert::success( $titre.' : '.$nom.' '.$prenom,' a bien été enregistrer');

        return redirect('/admin/prof');

    }

    
    public function destroy($id)
    {
        $prof = Prof::find($id);
        $nom = $prof->nom;
        $prenom = $prof->prenom;
    
        if (!$prof) {
            return redirect('/admin/prof')->with('error', 'Professeur non trouvé');
        }
    
        // Supprimez les cours liés via la relation définie dans le modèle Prof
        $prof->cours()->delete();
    
        // Supprimez le professeur lui-même
        $prof->delete();

        // Alert::success( 'le profésseur : '. $nom.' '.$prenom,' a bien été supprimé');

        return redirect('/admin/prof');
    }
    
    public function delete_cour($id) {
        $cour = Cour::find($id);
        $cour->delete();     
    }





    public function ajouter_un_cour($formation, $prof) {
        try {
            // Utiliser le modèle Cour pour vérifier si le cours existe déjà
            $coursExistants = Cour::where('prof_id', $prof)->where('formation_id', $formation)->get();
            // Vérifier si le cours existe déjà
            if ($coursExistants->count() > 0) {
                return response()->json(['ajout annuler !' => 'Le cours existe déjà.'], 400);
            }
    
            // Créer un nouveau cours
            $nvCour = new Cour();
            $nvCour->formation_id = $formation;
            $nvCour->prof_id = $prof;
            $nvCour->save();

        } catch (\Exception $e) {
            // Loguer l'exception pour le débogage
            \Log::error($e);
    
            // Retourner une réponse d'erreur
            return response()->json(['error' => 'Erreur interne du serveur'], 500);
        }
    }
    
    public function liste_formations($prof) {
        try {
            // Requête Eloquent pour récupérer les cours avec les informations associées
            $cours = Cour::leftJoin('formations', 'cours.formation_id', '=', 'formations.id')
                ->leftJoin('profs', 'cours.prof_id', '=', 'profs.id')
                ->where('cours.prof_id', $prof)
                ->select('cours.*', 'formations.*', 'profs.*', 'profs.id as id_prof', 'formations.id as id_formation', 'formations.titre as titre_formation', 'cours.id as id_cour')
                ->get();
    
            // Retournez les cours au format JSON
            return response()->json(['cours' => $cours]);
    
        } catch (\Exception $e) {
            // Loguer l'exception pour le débogage
            \Log::error($e);
    
            // Retourner une réponse d'erreur
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
    

}
