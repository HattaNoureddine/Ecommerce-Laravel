<?php

namespace App\Models;

use App\Models\User;
use App\Models\LigneCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    public function lignecommandes()
    {
        return $this->hasMany(LigneCommande::class,'commande_id','id');
    }

    public function client()
    {
        return $this->belongsTo(User::class,'client_id','id');
    }

    public function getTotal()
    {
        $total = 0;
        //liste des ligne de commande
        foreach($this->lignecommandes as $lc)
        {
            $total += $lc->product->price * $lc->qte;
        }
        return $total;
    }
}
