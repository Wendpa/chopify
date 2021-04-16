<?php

namespace App\Http\Controllers;

use App\Exports\ProduitExport;
use App\Models\User;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{

public function accueil () {

    $produits = Produit::orderByDesc("id")->take(9)->get();
    return view("welcome", [
        "produits" => $produits,
    ]);
}

   public function ajouterProduit()
   {
    $produit = Produit::create([
    "designation" => "cahier",
    "description" => "La description du cahier",
    "prix" => 500,
]);

dump($produit);


   }
   Public function createCategory(){

    $category = Categorie::create([
        "libelle" => "vetement",
    ]);

    $produit = Produit::create([
        "category_id"=> $category->id,
        "designation" => "pantalon",
        "description" => "La description du cahier",
        "prix" => 500,
    ]);
}


public function getProduit(Produit $produit)

    {

        $category = Categorie::first();


        //dd($category, $category->produits);

    }



public function updateProduit(Produit $produit)
{

    //dd($produit);
//$produit = Produit::findOrFail($produit);
//dd($produit);
$produit->designation = "Chemise";
$produit->description = "La description de la chemise";
$produit->prix = 6000;
$produit->save();
//dd($produit);

}

public function updateProduit2()
{

    //$produit = Produit::firstOrFail(2);


   $result = Produit::where("id", 2)->update([


    "designation" => "Tricot",

        "description" => "La description",
        "prix" => 3500,
    ]);
dd($result);

}

public function supprimerProduit($id)
{

$result = Produit::destroy($id);

}


public function commande()
{


    $user = User::first();
    // $user= User::create([
    //     "name" => "ISSA OUEDRAOGO",
    //     "email" => "issa2@gmail.com",
    //     "password" => Hash::make("admin123"),
    // ]);

    $produit1 = Produit::first();
    $produit2 = Produit::findOrFail(2);
    //$user->produits()->attach($produit1);
    $user->produits()->sync($produit2);
    //dd($user->produits);
}

public function collection(){


    $collection1 = collect([

      collect(["title " => "Mon super livre 1","price " => 3000,"description " => "La description du livre",]),
      collect(["title " => "Mon super livre 2","price " => 1500,"description " => "La description du livre",]),
      collect(["title " => "Mon super livre 3","price " => 2000,"description " => "La description du livre",]),


    ]);



    //dd($collection1)->first()->get("title");
}

public function exportProduit()
{


return Excel::download(new ProduitExport, "produits.xls");

}

}
