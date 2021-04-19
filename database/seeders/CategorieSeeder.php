<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Produit;
use Database\Factories\ProduitFactory;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Categorie::factory(10)->has(Produit::factory(5))->create();
        Categorie::create([
            "libelle" => "mangue",

        ]);

        Categorie::create([
            "libelle" => "Orange",
        ]);

        Categorie::create([
            "libelle" => "Goyave",
        ]);
    }
}
