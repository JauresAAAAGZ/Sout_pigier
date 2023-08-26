<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable=['Intitule_Filiere', 'Niveau_Filiere'];


 /**
     * Get the post that owns the comment.
     */
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}
