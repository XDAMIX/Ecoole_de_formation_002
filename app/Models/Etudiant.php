<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Etudiant extends Model
{
    
    use HasFactory;
        
    use SoftDeletes;

    protected $dates = ['deleted_at'];

// ------------doficication de id etudiant 
 // -----------------------------------------------------------------
 protected $fillable = ['code']; // Ajoutez les autres champs nécessaires

 protected static function boot()
 {
     parent::boot();

     // Événement déclenché après la création d'un nouvel enregistrement
     static::created(function ($etudiant) {
         $id_etudiant = $etudiant -> id; 
         $id_session = $etudiant -> session_id; 
         $session = Session::find($id_session);
         $id_formation = $session -> formation_id; 
        
         
         // Obtenir l'année actuelle
         $annee = Carbon::now()->year;

         // Mettre à jour le champ 'code' avec la concaténation  de  Annee d'inscription  ID_etudiant ID_formation ID_session 
         $etudiant->update(['code' => $annee .'E' . $id_etudiant. 'F'. $id_formation . 'S' . $id_session]);
     });
 }


}
