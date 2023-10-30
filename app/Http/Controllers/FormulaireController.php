<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use PDF;
use App\Models\Information;

class FormulaireController extends Controller
{
 public function showformulaire(){
    return view('formulaire');
 }

 public function pdf(Request $request)
{
    // ... Validation des données et téléchargements de fichiers ...

    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'age' => $request->input('age'),
        'phone' => $request->input('phone'),
        'formation' => $request->input('formation'),
        // ... Autres données ...
    ];

    $informations = Information::all()->first();
    $pdf = PDF::loadView('pdf', $data,['informations'=>$informations]);
    return $pdf->stream('pdf');
    // return('pdf');
}
}
