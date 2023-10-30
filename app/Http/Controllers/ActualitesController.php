<?php

namespace App\Http\Controllers;
use App\Models\Information;
use App\Models\Lien;
use App\Models\Telephone;
use App\Models\Photo;


use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    
    public function index(){
     

        
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        $liens = Lien::all();
        $ListePhotos = Photo::all();
        
        return view('Actualites',['informations'=>$informations,'telephones'=>$telephones,'liens'=>$liens,'photos'=>$ListePhotos]);
    }
    }

