@extends('layouts.admin_menu')
@section('content')

{{-- retour en arrière  --}}
<div class="container" id="titre-page">
  <div class="row">
      <div class="col-2 d-flex align-items-center">
          <a href="{{ url('/admin/etudiant') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i><span class="btn-description">Retour</span></a>
      </div>
      <div class="col-10 d-flex align-items-center">
          <h2>Nouveau étudiant</h2>
      </div>
  </div>
</div>


<div class="container" style="margin-top:20px;">

</div>

    <form action="{{ url('/admin/etudiant/save') }}" id="enr-form" method="POST" enctype="multipart/form-data">
        
        @csrf

        <label for="sex">Sexe:</label>
        <select id="sex" name="sex" required>
          <option value="">Sélectionner</option>
          <option value="homme">H</option>
          <option value="femme">F</option>
        </select><br><br>

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>
    
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

    
        <label for="age">Âge:</label>
        <input type="number" id="age" name="age" required><br><br>
    
        
    
        <label for="wilaya">Wilaya:</label>
        <input type="text" id="wilaya" name="wilaya" required><br><br>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
    
        <label for="tel">Tel:</label>
        <input type="number" id="tel" name="tel" required><br><br>
    
        <label for="profession">Profession:</label>
        <input type="text" id="Profession" name="Profession" required><br><br>
    
        <input type="submit" value="Enregistrer">
        <input type="reset" value="Annuler">
      </form>


      @endsection