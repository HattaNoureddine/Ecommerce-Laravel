<?php

namespace App\Models;

use App\Models\LigneCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Categorie::class,'category_id','id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'product_id','id');
    }

    public function ligneCommande()
    {
        return $this->hasMany(LigneCommande::class,'product_id','id');
    }
}
