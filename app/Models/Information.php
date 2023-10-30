<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
        /**
     * @var string $table
     */
    protected $table = 'informations';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'nom',
        'adresse',
        'localisation',
        'email',
        'heure_travail',
        'logo'
    ];
    use HasFactory;
}
