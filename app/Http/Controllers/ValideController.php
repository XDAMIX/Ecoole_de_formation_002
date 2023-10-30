<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Prof;
use App\Models\Etudiant;
use App\Models\Inscription;

use RealRashid\SweetAlert\Facades\Alert;

class ValideController extends Controller
{
   public function validepage ($id){
    
    $inscription = Inscription::find($id);
    $session = Session::all();
    return view('admin/valide/valid',['inscription'=>$inscription,'session'=>$session]);


   }
}
