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

   

    public function pvs()
    {
        return $this->hasMany(PV::class);
    }

    public function memoires()
    {
        return $this->hasMany(Memoire::class);
    }


    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class);
    }


    public function president()
    {
        return $this->belongsto(Professeur::class,"President");
    }

    public function examinateur()
    {
        return $this->belongsto(Professeur::class,"Examinateur");
    }

    public function rapporteur()
    {
        return $this->belongsto(Professeur::class,"Rapporteur");
    }

}
