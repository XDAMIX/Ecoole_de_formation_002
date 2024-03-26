<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\TypePs;
use App\Models\TypePaiement;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\FormationRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FormationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ListeFormations = Formation::all();
        return view('admin.formations.index', ['formations' => $ListeFormations]);
    }


    public function show($id)
    {
        $formation = Formation::find($id);
        $types = TypePs::all();
        $paiements = TypePaiement::where('formation_id', '=', $id)->get();
        
        return view('admin.formations.voir', ['formation' => $formation,'types'=>$types,'paiements' => $paiements]);
    }


    public function create()
    {
        $types = TypePs::all();
        return view('admin.formations.ajouter', ['types' => $types]);
    }

    public function store(FormationRequest $request)
    {
        $nvformation = new Formation();

        $nvformation->titre = $request->input('titre');
        $nvformation->dure = $request->input('dure');
        $nvformation->description = $request->input('description');
        $nvformation->publique = $request->input('publique');
        $nvformation->objectifs = $request->input('objectifs');
        if ($request->hasFile('photo')) {
            $nvformation->photo = $request->photo->store('/public/images/formations');
        }


        $titre = $request->input('titre');

        $nvformation->save();

        // pour enregistrer les prix 
        $formation = Formation::latest()->first();

        $id_formation = $formation->id;

        $types = TypePs::all();

        foreach ($types as $type) {
            $nvPrix = new TypePaiement();
            $nvPrix->type_id = $type->id;
            $nvPrix->titre = $type->titre;
            $nvPrix->formation_id = $id_formation;
            $montant = $request->input('montant_' . $type->titre);
            if ($montant !== null && $montant !== '') {
                $nvPrix->prix = $request->input('montant_' . $type->titre);
            } else {
                $nvPrix->prix = '0';
            }
            $nvPrix->save();
        }

        Alert::success($titre, 'a bien été enregistré');
        return redirect('/admin/formations');
    }

    public function edit($id)
    {
        $formation = Formation::find($id);
        $types = TypePs::all();
        $paiements = TypePaiement::where('formation_id', '=', $id)->get();
        return view('admin.formations.modifier', ['formation' => $formation, 'types' => $types, 'paiements' => $paiements]);
    }

    public function update(FormationRequest $request, $id)
    {
        $formation = Formation::find($id);
        $formation->titre = $request->input('titre');
        $formation->dure = $request->input('dure');
        $formation->description = $request->input('description');
        $formation->publique = $request->input('publique');
        $formation->objectifs = $request->input('objectifs');
        if ($request->hasFile('photo')) {
            $formation->photo = $request->photo->store('/public/images/formations');
        }

        $formation->save();

        $types = TypePs::all();
        $paiements = TypePaiement::where('formation_id', '=', $id)->get();

        if ($paiements->isEmpty()) {
            foreach ($types as $type) {
                $nvPrix = new TypePaiement();
                $nvPrix->type_id = $type->id;
                $nvPrix->titre = $type->titre;
                $nvPrix->formation_id = $id;
                $montant = $request->input('montant_' . $type->titre);
                if ($montant !== null && $montant !== '') {
                    $nvPrix->prix = $request->input('montant_' . $type->titre);
                } else {
                    $nvPrix->prix = '0';
                }
                $nvPrix->save();
            }

        } else {
            // Le tableau $paiements n'est pas vide
            foreach ($types as $type) {

                foreach ($paiements as $paiement) {
                    if ($paiement->titre == $type->titre) {
                        $montant = $request->input('montant_' . $type->titre);
                        if ($montant !== null && $montant !== '') {
                            $paiement->prix = $request->input('montant_' . $type->titre);
                        } else {
                            $paiement->prix = '0';
                        }
                        $paiement->save();
                    }
                }
            }
        }



        return redirect('/admin/formations');
    }

    public function destroy($id)
    {
        $formation = Formation::find($id);
        $formation->delete();
        return redirect('/admin/formations');
    }
}
