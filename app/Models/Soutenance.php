<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soutenance extends Model
{
    use HasFactory;
    protected $fillable=['Date_Soutenance', 'Heure_Soutenance', 'Salle_Soutenance'];
}
