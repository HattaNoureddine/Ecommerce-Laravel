<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Louer extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'price', 'qte', 'photo', 'created_at', 'updated_at'];
}
