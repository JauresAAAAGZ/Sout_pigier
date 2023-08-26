<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurys extends Model
{
    use HasFactory;
    protected $fillable=['NumJury', 'President', 'Examinateur', 'Rapporteur']; 

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}
