@extends('layouts.admin_menu')
@section('content')



    <h1>modifier l'etudiant  {{$etudiant->nom}} </h1>
    <form action="{{ url('/admin/etudiant/'.$etudiant->id.'/update') }}"id="enr-form" method="POST" enctype="multipart/form-data">
        
        @csrf
        @method('PUT')


        <label for="sexe">Sexe:</label>
        <select id="sexe" name="sexe" required>
          <option value="" disabled selected>Sélectionner</option>
          <option value="homme" <?php if ($etudiant->sexe === 'homme') echo 'selected'; ?>>H</option>
          <option value="femme" <?php if ($etudiant->sexe === 'femme') echo 'selected'; ?>>F</option>
        </select><br><br>

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="{{$etudiant->nom}}" required><br><br>
    
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="{{$etudiant->prenom}}" required><br><br>
    

        <label for="age">Âge:</label>
        <input type="number" id="age" name="age" value="{{$etudiant->age}}" required><br><br>
    
        <label for="wilaya">Wilaya:</label>
        <input type="text" id="wilaya" name="wilaya" value="{{$etudiant->wilaya}}" required><br><br>
    
        <label for="email">email:</label>
        <input type="email" id="email" name="email" value="{{$etudiant->email}}" required><br><br>
    
        <label for="tel">Tel:</label>
        <input type="number" id="tel" name="tel" value="{{$etudiant->tel}}" required><br><br>
    
        <label for="profession">profession:</label>
        <input type="text" id="profession" name="profession" value="{{$etudiant->profession}}" required><br><br>
    
        <input type="submit" value="Enregistrer">
        <input type="reset" value="Annuler">
      </form>

@endsection