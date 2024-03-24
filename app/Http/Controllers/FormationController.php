<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\TypePs;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\FormationRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FormationController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }

    public function index() {
        $ListeFormations = Formation::all();
        return view('admin.formations.index',['formations'=>$ListeFormations]);
    }


    public function show($id)
    {
        $formation = Formation::find($id);
        return view('admin.formations.voir', ['formation' => $formation]);
    }


    public function create() {
        $types = TypePs::all();
        return view('admin.formations.ajouter',['types'=> $types]);
    }

    public function store(FormationRequest $request) {
        $nvformation = new Formation();

        $nvformation->titre = $request->input('titre');
        $nvformation->dure = $request->input('dure');
        $nvformation->description = $request->input('description');
        $nvformation->publique = $request->input('publique');
        $nvformation->objectifs = $request->input('objectifs');
        if($request->hasFile('photo')){
            $nvformation->photo = $request->photo->store('/public/images/formations');
        }


        $titre = $request->input('titre');

        $nvformation->save();
        
        Alert::success($titre, 'a bien été enregistré');
        return redirect('/admin/formations');
    }

    public function edit($id) {
        $formation = Formation::find($id);
        return view('admin.formations.modifier',['formation' => $formation]);
    }

    public function update(FormationRequest $request,$id) {
        $formation = Formation::find($id);
        $formation->titre = $request->input('titre');
        $formation->dure = $request->input('dure');
        $formation->description = $request->input('description');
        $formation->publique = $request->input('publique');
        $formation->objectifs = $request->input('objectifs');
        if($request->hasFile('photo')){
            $formation->photo = $request->photo->store('/public/images/formations');
        }

        $formation->save();
        return redirect('/admin/formations');

    }

    public function destroy($id) {
        $formation = Formation::find($id);
        $formation->delete();     
        return redirect('/admin/formations');
    }
}
