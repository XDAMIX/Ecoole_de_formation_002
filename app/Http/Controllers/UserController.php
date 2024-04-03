<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::success( 'Vos informations ont été modifiées avec succès')->position('center')->autoClose(2000);
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
            // 'nouveau_mot_de_passe' => 'required|string|min:8|confirmed',
            'nouveau_mot_de_passe' => 'required|string|min:8',
            'nouveau_mot_de_passe_confirmation' => 'required|string|min:8',
        ]);

        // Trouver l'utilisateur
        $user = User::findOrFail($id);

        // Vérifier que le mot de passe actuel correspond
        if (!Hash::check($request->input('mot_de_passe_actuel'), $user->password)) {
            Alert::error( 'Le mot de passe actuel est incorrect')->position('center')->autoClose(2000);
            return view('admin.users.changer', compact('user'));
        }
        
        // Mettre à jour le mot de passe
        else {
            $nouveaupassword = $request->input('nouveau_mot_de_passe');
            $confirmpassword = $request->input('nouveau_mot_de_passe_confirmation');

            if($nouveaupassword !== $confirmpassword){
                Alert::error( 'Le mot de passe de confirmation ne correspond pas au nouveau mot de passe')->position('center')->autoClose(3000);
                return view('admin.users.changer', compact('user'));
            }
            else{
                $user->password = Hash::make($request->input('nouveau_mot_de_passe'));
                $user->save();
                Alert::success( 'Votre mot de passe a été modifié avec succès')->position('center')->autoClose(2000);
                return view('admin.users.voir', compact('user'));
            }
        }

    }
}
