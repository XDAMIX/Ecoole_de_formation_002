<?php

namespace App\Http\Controllers;
use App\Models\Telephone;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\TelephoneRequest;
use Illuminate\Http\Request;


use RealRashid\SweetAlert\Facades\Alert;

class TelephoneController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

public function index(){
    $ListeTelephones = Telephone::all();
    //
}

public function create() {
   return view('admin.ecole.telephones.ajouter');
}

public function store(TelephoneRequest $request) {
    $nvtel = new Telephone();

    $nvtel->operateur = $request->input('operateur');
    $nvtel->numero = $request->input('numero');


    $nvtel->save();

            // message popup
            Alert::success( 'votre numéro de téléphone a été ajouté avec succès ! merci')->position('center')->autoClose(2000);

    return redirect('/admin/ecole');
}

public function edit($id) {
    $tel = Telephone::find($id);
    return view('admin.ecole.telephones.modifier',['telephone' => $tel]);
}

public function update(TelephoneRequest $request,$id) {
    $tel = Telephone::find($id);
    $tel->numero = $request->input('numero');
    $tel->operateur = $request->input('operateur');

    $tel->save();

        // message popup
        Alert::success( 'votre numéro de téléphone a été modifié avec succès ! merci')->position('center')->autoClose(2000);

    return redirect('/admin/ecole');

}

public function destroy($id) {
    $tel = Telephone::find($id);
    $tel->delete();     
    return redirect('/admin/ecole');
}



}