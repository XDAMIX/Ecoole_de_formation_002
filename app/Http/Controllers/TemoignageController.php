<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temoignage;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\TemoignageRequest;
use RealRashid\SweetAlert\Facades\Alert;
class TemoignageController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }

    public function index() {
        $ListeTem = Temoignage::all();
        return view('admin.temoignages.index',['temoignages'=>$ListeTem]);
    }

    public function create() {
        return view('admin.temoignages.ajouter');
    }

    public function store(TemoignageRequest $request) {
        $nvTemoignage = new Temoignage();

        $nvTemoignage->nom = $request->input('nom');
        $nvTemoignage->poste = $request->input('poste');
        $nvTemoignage->mot = $request->input('mot');

        if($request->hasFile('photo')){
            $nvTemoignage->photo = $request->photo->store('/public/images/temoignages');
        }
        
        $nvTemoignage->save();
        Alert::success('le nouveau témoin a bien été enregistré');
        return redirect('/admin/temoignages');

    }

    public function edit($id) {
        $Temoignage = Temoignage::find($id);
        return view('admin.temoignages.modifier',['temoignage' => $Temoignage]);
    }

    public function update(TemoignageRequest $request,$id) {
        $Temoignage = Temoignage::find($id);

        $Temoignage->nom = $request->input('nom');
        $Temoignage->poste = $request->input('poste');
        $Temoignage->mot = $request->input('mot');

        if($request->hasFile('photo')){
            $Temoignage->photo = $request->photo->store('/public/images/temoignages');
        }

        $Temoignage->save();
        Alert::success('le témoin a bien été modifer');
        return redirect('/admin/temoignages');

    }

    public function destroy($id) {
        $Temoignage = Temoignage::find($id);
        $Temoignage->delete();     
        return redirect('/admin/temoignages');
    }
}
