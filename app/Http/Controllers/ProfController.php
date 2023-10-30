<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Prof;

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
    
    public function create() {
        return view('admin/prof/ajouter');
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
        return view('admin/prof/modifier',['prof' => $prof]);
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
