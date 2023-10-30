<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\BannerRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

public function index(){
    $ListeBanners = Banner::all();
    return view('admin.banners.index',['banners'=>$ListeBanners]);
}

public function create() {
    return view('admin.banners.ajouter');
}

public function store(BannerRequest $request) {
    $nvBanner = new Banner();

    $nvBanner->titre = $request->input('titre');
    if($request->hasFile('photo')){
        $nvBanner->photo = $request->photo->store('/public/images/banners');
    }

    $nvBanner->save();
    Alert::success('La publicité : '.$nvBanner->titre.', a bien été enregistrée');
    return redirect('/admin/banners');
}

public function edit($id) {
    $Banner = Banner::find($id);
    return view('admin.banners.modifier',['banner' => $Banner]);
}

public function update(BannerRequest $request,$id) {
    $Banner = Banner::find($id);
    $Banner->titre = $request->input('titre');
        if ($request->hasFile('photo')) {
        $Banner->photo = $request->photo->store('/public/images/banners');
    }

    $Banner->save();
    Alert::success('La publicité : '.$Banner->titre.', a bien été Modifiée');
    return redirect('/admin/banners');
    }

public function destroy($id) {
    $Banner = Banner::find($id);
    $Banner->delete();
    Alert::success('La publicité : '.$Banner->titre.', a bien été supprimé');
    return redirect('/admin/banners');
}
}
