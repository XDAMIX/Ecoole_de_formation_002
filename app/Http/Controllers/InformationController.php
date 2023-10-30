<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Lien;
use App\Models\Telephone;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\InformationRequest;

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
    


        return view('admin.ecole.index',[ 'informations'=>$listeinformations , 'liens'=>$listeliens , 'telephones'=>$listetelephones]);
    



    }

    public function create() {

    }

    public function store() {

    }

    public function edit($id) {
        $information = Information::find($id);
        return view('admin.ecole.informations.modifier',['information' => $information]);
    }

    public function update(InformationRequest $request,$id) {
        $information = information::find($id);
        $information->nom = $request->input('nom');
        $information->adresse = $request->input('adresse');
        $information->localisation = $request->input('localisation');
        $information->email = $request->input('email');
        $information->heure_travail = $request->input('heure_travail');
        if($request->hasFile('logo')){
            $information->logo = $request->logo->store('/public/images/logo');
        }

        $information->save();
        return redirect('/admin/ecole');

    }

    public function destroy() {

    }
}
