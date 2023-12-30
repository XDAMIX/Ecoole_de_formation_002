<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Lien;
use App\Models\Telephone;
use App\Models\Acceuil;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\InformationRequest;

use RealRashid\SweetAlert\Facades\Alert;

class InformationController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }

    public function index() {
        $listeinformations = Information::all();
        $listeliens = Lien::all();
        $listetelephones = Telephone::all();
        $acceuils = Acceuil::all();
    
        if ($listeinformations->isEmpty()) {
            return redirect('/admin/ecole/save');
        }
        if ($acceuils ->isEmpty()) {

            $acceuil = new Acceuil();
            $acceuil->titre = '';
            $acceuil->sous_titre1 = '';
            $acceuil->sous_titre2 = '';
            $acceuil->photo = '';
    
            $acceuil->save();
        }

        $listeinformations = Information::all();
        $acceuils = Acceuil::all();

        return view('admin.ecole.index',[ 'informations'=>$listeinformations , 'liens'=>$listeliens , 'telephones'=>$listetelephones, 'acceuils' => $acceuils]);
    
    }

    public function create() {

    }

    public function store() {
        $information = new Information();

        $information->nom = '';
        $information->adresse = '';
        $information->localisation = '';
        $information->email = '';
        $information->site_web = '';
        $information->heure_travail = '';
        $information->logo = '';
        $information->wilaya = '';

        $information->save();

        return redirect('/admin/ecole');
    }

    public function edit($id) {
        $information = Information::find($id);
        return view('admin.ecole.informations.modifier',['information' => $information]);
    }

    public function update(InformationRequest $request,$id) {
        $information = information::find($id);
        $information->nom = $request->input('nom');
        $information->wilaya = $request->input('wilaya');
        $information->adresse = $request->input('adresse');
        $information->localisation = $request->input('localisation');
        $information->email = $request->input('email');
        $information->site_web = $request->input('site_web');
        $information->heure_travail = $request->input('heure_travail');
        if($request->hasFile('logo')){
            $information->logo = $request->logo->store('/public/images/logo');
        }

        $information->save();

        // message popup
        Alert::success( 'Les informations ont été modifiées avec succès ! merci')->position('center')->autoClose(2000);

        return redirect('/admin/ecole');

    }

    public function destroy() {

    }
}
