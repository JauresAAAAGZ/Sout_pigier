<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memoire extends Model
{
    use HasFactory;
    protected $fillable=['Theme', 'Nombre_Pages', 'Date_Depot'];
    

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}
