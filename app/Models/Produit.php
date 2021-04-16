<?php

namespace App\Models;


use App\Models\User;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    public $fillable = ["category_id", "description", "designation", "prix" , "image"];


    public function categorie(){
return $this->belongsTo(Categorie::class);

    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
