<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // Méthode pour afficher un utilisateur spécifique
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.voir', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.modifier', compact('user'));
    }



    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->hasFile('photo')) {
            $user->photo = $request->photo->store('/public/images/users');
        }
        $user->save();

        return view('admin.users.voir', compact('user'));
    }


    public function motDePasse($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.changer', compact('user'));
    }

    public function changerMotDePasse(Request $request, $id)
    {
        // Valider les données
        $request->validate([
            'mot_de_passe_actuel' => 'required',
            'nouveau_mot_de_passe' => 'required|string|min:8|confirmed',
        ]);

        // Trouver l'utilisateur
        $user = User::findOrFail($id);

        // Vérifier que le mot de passe actuel correspond
        if (!Hash::check($request->input('mot_de_passe_actuel'), $user->password)) {
            return response()->json(['message' => 'Le mot de passe actuel est incorrect !'], 400);
        }

        // Mettre à jour le mot de passe
        else {
            $user->password = Hash::make($request->input('nouveau_mot_de_passe'));
            $user->save();
            // return response()->json(['message' => 'Le mot de passe actuel est correct, le mot de passe est changé avec succes'], 400);
        }

        return view('admin.users.voir', compact('user'));
    }
}
