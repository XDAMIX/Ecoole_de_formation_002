<?php

namespace App\Http\Controllers;
use App\Models\Lien;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\LienRequest;
use Illuminate\Http\Request;

class LienController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
// 1 TWITTER
public function edittwitter($id) {
    $lien = Lien::find($id);
    return view('admin.ecole.liens.modifier_twitter',['lien' => $lien]);
}

public function updatetwitter(LienRequest $request,$id) {
    $lien = Lien::find($id);
    $lien->lien = $request->input('lien');
    $lien->save();
    return redirect('/admin/ecole');
}

// 2 FACEBOOK
public function editfacebook($id) {
    $lien = Lien::find($id);
    return view('admin.ecole.liens.modifier_facebook',['lien' => $lien]);
}

public function updatefacebook(LienRequest $request,$id) {
    $lien = Lien::find($id);
    $lien->lien = $request->input('lien');
    $lien->save();
    return redirect('/admin/ecole');
}

// 3 INSTAGRAM
public function editinstagram($id) {
    $lien = Lien::find($id);
    return view('admin.ecole.liens.modifier_instagram',['lien' => $lien]);
}

public function updateinstagram(LienRequest $request,$id) {
    $lien = Lien::find($id);
    $lien->lien = $request->input('lien');
    $lien->save();
    return redirect('/admin/ecole');
}

// 4 YOUTUBE
public function edityoutube($id) {
    $lien = Lien::find($id);
    return view('admin.ecole.liens.modifier_youtube',['lien' => $lien]);
}

public function updateyoutube(LienRequest $request,$id) {
    $lien = Lien::find($id);
    $lien->lien = $request->input('lien');
    $lien->save();
    return redirect('/admin/ecole');
}

// 5 LINKEDIN
public function editlinkedin($id) {
    $lien = Lien::find($id);
    return view('admin.ecole.liens.modifier_linkedin',['lien' => $lien]);
}

public function updatelinkedin(LienRequest $request,$id) {
    $lien = Lien::find($id);
    $lien->lien = $request->input('lien');
    $lien->save();
    return redirect('/admin/ecole');
}

// 6 TIKTOK
public function edittiktok($id) {
    $lien = Lien::find($id);
    return view('admin.ecole.liens.modifier_tiktok',['lien' => $lien]);
}

public function updatetiktok(LienRequest $request,$id) {
    $lien = Lien::find($id);
    $lien->lien = $request->input('lien');
    $lien->save();
    return redirect('/admin/ecole');
}
}
