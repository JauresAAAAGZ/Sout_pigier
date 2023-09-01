<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;
    protected $fillable=['Nom_Professeur', 'Prenom_Professeur', 'Grade'];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }


   

    public function jurys()
    {
        return $this->belongsToMany(Jurys::class);
    }

}
