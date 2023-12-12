<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeLouer extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom', 'prenom', 'tel', 'addresse', 'image_cin', 'created_at', 'updated_at'];
}
