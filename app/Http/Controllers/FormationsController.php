<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Information;
use App\Models\Lien;
use App\Models\Telephone;
class FormationsController extends Controller
{
    public function index() {
        $ListeFormations = Formation::all();
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        $liens = Lien::all();
        return view('formations',['formations'=>$ListeFormations,'informations'=>$informations,'telephones'=>$telephones,'liens'=>$liens]);
    }
}
