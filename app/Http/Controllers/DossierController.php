<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dossier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DossierController extends Controller
{
    public function index(){
        $dossiers = Dossier::all();
        return view('admin.ecole.dossier.index',['dossiers'=>$dossiers]);
    }

    public function create(){
        return view('admin.ecole.dossier.ajouter');
    }

    public function store(Request $request){
        $nvdossier = new Dossier();
        $nvdossier->titre = $request->input('titre');
        $nvdossier->save();

        $titre = $request->input('titre');

        Alert::success($titre, 'a bien été enregistré');

        return response()->json(['titre' => $titre]);
        // return redirect('/admin/dossier');

    }
    public function store_ajax($titre){
        $nvdossier = new Dossier();
        $nvdossier->titre = $titre;
        $nvdossier->save();

    }

    public function index_ajax(){
        $dossiers = Dossier::all();
        return response()->json(['dossiers' => $dossiers]);
    }
    
    public function supp_ajax($id){
        $dossier= Dossier::find($id);
        $dossier->delete();
    }


    public function update_ajax($id,$titre)
    {
        $dossier =  Dossier::find($id);
        $dossier->titre = $titre;
        $dossier->save();
        
    }


    public function edit($id)
    {
        $dossier = Dossier::find($id);
        return view('admin.ecole.dossier.modifier',['dossier'=>$dossier]);
    }

    public function update(Request $request,$id)
    {
        $dossier =  Dossier::find($id);
        $dossier->titre = $request->input('titre');
        $dossier->save();
        return redirect('/admin/dossier');
    }
    

    public function destroy($id)
    {
        $dossier= Dossier::find($id);
        $dossier->delete();
        

        return redirect('/admin/dossier');
    }

}
