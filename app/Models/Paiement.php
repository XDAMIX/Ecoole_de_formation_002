<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'etudiant_id', 'user_id', 'date_paiement', 'montant',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_paiement' => 'date',
    ];

    /**
     * Get the etudiant record associated with the paiement.
     */
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    /**
     * Get the user record associated with the paiement.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
