<?php

namespace App\Http\Controllers;

use App\Models\TypePs;
use App\Models\TypePaiement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class TypePsController extends Controller
{

    public function index()
    {
        $types = TypePs::all();
        return view('admin.formations.types.index', ['types'=>$types]);

    }

    
    public function create()
    {
       return view('admin.formations.types.ajouter');
    }

    public function store(Request $request)
    {
        $nvtype = new TypePs();

        $nvtype->titre = $request->input('titre');
        
        $titre = $request->input('titre');

        $nvtype->save();
        
        Alert::success($titre, 'a bien été enregistré');
        return redirect('/admin/types_p');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypePs  $typePs
     * @return \Illuminate\Http\Response
     */
    public function show(TypePs $typePs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypePs  $typePs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = TypePs::find($id);
        return view('admin.formations.types.modifier',['type'=>$type]);
    }


    public function update(Request $request,$id)
    {
        $type =  TypePs::find($id);
        $type->titre = $request->input('titre');
        $type->save();
        return redirect('/admin/types_p');
    }


    public function destroy($id)
    {
        $type= TypePs::find($id);
        $type->delete();
        
        $type_sups = TypePaiement::where("type_id","=",$id )->get();
        foreach($type_sups as $type_sup){

            $type_sup->delete(); 
        }
        return redirect('/admin/types_p');
    }
}
