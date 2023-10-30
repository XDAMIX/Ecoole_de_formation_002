<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudiantRequest;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use RealRashid\SweetAlert\Facades\Alert;




class EtudiantController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }

    public function index() {
        $ListeEtudiants = Etudiant::all();
        // $ListeEtudiants = Etudiant::where('age','=',2)->get();

        // $ListeEtudiants = Etudiant::select('nom', 'prenom')->distinct()->get();

        return view('admin/etudant/index',['etudiants'=>$ListeEtudiants]);
    }

    public function create() {
        return view('admin/etudant/ajouter');
    }

    public function store(Request $request) {
       

        $nvEtudiant = new Etudiant();

        $nvEtudiant->sexe = $request->input('sexe');
        $nvEtudiant->nom = $request->input('nom');
        $nvEtudiant->prenom = $request->input('prenom');

        $nvEtudiant->age = $request->input('age');
        $nvEtudiant->wilaya = $request->input('wilaya');

        $nvEtudiant->email = $request->input('email');
        $nvEtudiant->tel = $request->input('tel');
        $nvEtudiant->profession = $request->input('profession');


        // if($request->hasFile('photo')){
            // $nvformation->photo = $request->photo->store('/public/images/formations');
        // }


        $nom = $request->input('nom');
        $prenom = $request->input('prenom');

        $nvEtudiant->save();
        
        Alert::success( $nom.' '.$prenom,' a bien été enregistré');
        return redirect('/admin/etudiant');
    
    }

    public function edit($id) {
        $etudiant = Etudiant::find($id);
        return view('admin/etudant/modifier',['etudiant' => $etudiant]);
    }

    public function update(Request $request,$id) {
        $etudiant = Etudiant::find($id);
        $etudiant->sexe = $request->input('sexe');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->age = $request->input('age');
        $etudiant->wilaya = $request->input('wilaya');

        $etudiant->email = $request->input('email');
        $etudiant->tel = $request->input('tel');
        $etudiant->profession = $request->input('profession');

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
}
