<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\PhotoRequest;
use RealRashid\SweetAlert\Facades\Alert;


class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

public function index(){
    $ListePhotos = Photo::all();
    return view('admin.gallerie.index',['photos'=>$ListePhotos]);
}

public function create() {
    return view('admin.gallerie.ajouter');
}

public function store(PhotoRequest $request) {
    $nvPhoto = new Photo();

    $nvPhoto->titre = $request->input('titre');
    $nvPhoto->emplacement = $request->input('emplacement');
    $nvPhoto->dure = $request->input('dure');
    $nvPhoto->description = $request->input('description');
    if($request->hasFile('photo')){
        $nvPhoto->photo = $request->photo->store('/public/images/gallerie');
    }
    $titre = $request->input('titre');
    $nvPhoto->save();
    Alert::success($titre, 'a bien été enregistré');
    return redirect('/admin/gallerie');
}

public function edit($id) {
    $Photo = Photo::find($id);
    return view('admin.gallerie.modifier',['photo' => $Photo]);
}

public function update(PhotoRequest $request,$id) {
    $Photo = Photo::find($id);
    $Photo->titre = $request->input('titre');
    $Photo->emplacement = $request->input('emplacement');
    $Photo->dure = $request->input('dure');
    $Photo->description = $request->input('description');
    if($request->hasFile('photo')){
        $Photo->photo = $request->photo->store('/public/images/gallerie');
    }

    $Photo->save();
    return redirect('/admin/gallerie');

}

public function destroy($id) {
    $Photo = Photo::find($id);
    $Photo->delete();
    return redirect('/admin/gallerie');
}

}


