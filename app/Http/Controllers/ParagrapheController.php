<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paragraphe;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\ParagrapheRequest;

use RealRashid\SweetAlert\Facades\Alert;

class ParagrapheController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

public function index(){
    $ListeParagraphes = Paragraphe::all();
    return view('admin.ecole.paragraphes.index',['paragraphes'=>$ListeParagraphes]);
}

public function create() {
    return view('admin.ecole.paragraphes.ajouter');
}

public function store(ParagrapheRequest $request) {
    $nvParagraphe = new Paragraphe();

    $nvParagraphe->titre = $request->input('titre');
    $nvParagraphe->sous_titre = $request->input('sous_titre');
    $nvParagraphe->paragraphe = $request->input('paragraphe');
    if($request->hasFile('photo')){
        $nvParagraphe->photo = $request->photo->store('/public/images/presentation');
    }

    $nvParagraphe->save();

            // message popup
            Alert::success( 'votre bloc de présentation a été ajouté avec succès ! merci')->position('center')->autoClose(2000);

    return redirect('/admin/ecole/presentation');
}

public function edit($id) {
    $paragraphe = Paragraphe::find($id);
    return view('admin.ecole.paragraphes.modifier',['paragraphe' => $paragraphe]);
}

public function update(ParagrapheRequest $request,$id) {
    $paragraphe = Paragraphe::find($id);
    $paragraphe->titre = $request->input('titre');
    $paragraphe->sous_titre = $request->input('sous_titre');
    $paragraphe->paragraphe = $request->input('paragraphe');
    if($request->hasFile('photo')){
        $paragraphe->photo = $request->photo->store('/public/images/presentation');
    }

    $paragraphe->save();

            // message popup
            Alert::success( 'votre bloc de présentation a été modifié avec succès ! merci')->position('center')->autoClose(2000);
    
    return redirect('/admin/ecole/presentation');

}

public function destroy($id) {
    $paragraphe = Paragraphe::find($id);
    $paragraphe->delete();     
    return redirect('/admin/ecole/presentation');
}
}


