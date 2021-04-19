<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produit::create([
            "categorie_id"=>1,
            "designation" => "Sac à main",
            "description" => " la description",
            "prix" => 45000,
        ]);

        Produit::create([
            "categorie_id"=>2,
            "designation" => "Ordinateur",
            "description" => " la description",
            "prix" => 300000,
        ]);

        Produit::create([
            "categorie_id"=>3,
            "designation" => "Telephone",
            "description" => " la description",
            "prix" => 100000,
        ]);
    }
}
