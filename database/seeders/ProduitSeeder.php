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
            "designation" => "Sac à main",
            "description" => " la description",
            "prix" => 45000,
        ]);

        Produit::create([
            "designation" => "Ordinateur",
            "description" => " la description",
            "prix" => 300000,
        ]);

        Produit::create([
            "designation" => "Telephone",
            "description" => " la description",
            "prix" => 100000,
        ]);
    }
}
