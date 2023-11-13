<?php
// dami 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acceuil;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\AcceuilRequest;

use RealRashid\SweetAlert\Facades\Alert;

class AcceuilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $acceuils = Acceuil::all();
        return view('admin.ecole.acceuil.index',['acceuils' => $acceuils]);
    }

    public function edit($id) {
        $acceuil = Acceuil::find($id);
        return view('admin.ecole.acceuil.modifier',['acceuil' => $acceuil]);
    }

    public function update(AcceuilRequest $request,$id) {
        $acceuil = Acceuil::find($id);
        $acceuil->titre = $request->input('titre');
        $acceuil->sous_titre1 = $request->input('stitre1');
        $acceuil->sous_titre2 = $request->input('stitre2');
        if($request->hasFile('photo')){
            $acceuil->photo = $request->photo->store('/public/images/acceuil');
        }
        $acceuil->save();

        // message popup
        Alert::success( 'Le banner a été modifié avec succès ! merci')->position('center')->autoClose(2000);

        return redirect('/admin/ecole');
    }
}
