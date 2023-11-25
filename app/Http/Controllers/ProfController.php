<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Information;
use Illuminate\Http\Request;
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
        $ListeProfs = Prof::all();
        return view('admin/prof/index',['profs'=>$ListeProfs]);

    }

    public function show($id)
    {
        $prof = Prof::find($id);
        return view('admin/prof/voir', ['prof' => $prof]);
    }


    public function telecharger_pdf_prof($id)
    {
        $prof = Prof::find($id);
        $informations = Information::all()->first();

        $data = [
            'sexe' => $prof->sexe,
            'nom' => $prof->nom,
            'prenom' => $prof->prenom,
            'age' => $prof->age,
            'tel' => $prof->tel,
            'email' => $prof->email,
            'specialite' => $prof->specialite,
            'date' => $prof->created_at,
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
        return view('admin/prof/ajouter',['formations' => $listeformations]);
    }

    
    public function store(Request $request) {
       

        $nvProf = new Prof();

        $nvProf->sexe = $request->input('sexe');
        $nvProf->nom = $request->input('nom');
        $nvProf->prenom = $request->input('prenom');
      
        $nvProf->age = $request->input('age');
        $nvProf->email = $request->input('email');
        $nvProf->tel = $request->input('tel');
        $nvProf->specialite = $request->input('specialite');
      
       
        // if($request->hasFile('photo')){
            // $nvProf->photo = $request->photo->store('/public/images/formations');
        // }


        $nom = $request->input('nom');
        $prenom = $request->input('prenom');

        $nvProf->save();
        
        Alert::success( $nom.' '.$prenom,' a bien été enregistré');
        return redirect('/admin/prof');
    
    }

    public function edit($id) {
        $prof = Prof::find($id);
        $listeformations = Formation::all();

        return view('admin/prof/modifier',['prof' => $prof,'formations' => $listeformations]);
    }

    public function update(Request $request,$id) {
        $prof = Prof::find($id);

        $prof->sexe = $request->input('sexe');
        $prof->nom = $request->input('nom');
        $prof->prenom = $request->input('prenom');
        $prof->age = $request->input('age');
        $prof->email = $request->input('email');
        $prof->tel = $request->input('tel');
        $prof->specialite = $request->input('specialite');
        

        // if($request->hasFile('photo')){
        //     $formation->photo = $request->photo->store('/public/images/formations');
        // }
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');

        Alert::success( $nom.' '.$prenom,' a bien été modifer');

        $prof->save();
        return redirect('/admin/prof');

    }

    
    public function destroy($id) {
        $prof = Prof::find($id);
        $prof->delete();     
        return redirect('/admin/prof');
    }
}
