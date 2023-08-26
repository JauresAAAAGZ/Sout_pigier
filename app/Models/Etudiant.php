<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable=['Matricule', 'Nom', 'Prenom', 'Niveau_Etude', 'Date_Naissance', 'Lieu_Naissance'];



    /**
     * Recuperer la filiere de l''etudiant
     */
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
    public function memoire()
    {
        return $this->belongsTo(Memoire::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function jury()
    {
        return $this->belongsTo(Jurys::class);
    }



}



