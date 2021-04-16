<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Categorie;
use App\Mail\ProduitAjoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProduiFormRequest;
use App\Notifications\ModificationProduit;
use Illuminate\Routing\RedirectController;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits =Produit::orderBydesc("id")->paginate(5);

       // $produits500 = Produit::where("prix", 500)->get();

      //  $produit = Produit::findOrFail(10);
       // dd($produit);

      // $premier = Produit::first();
       //dd($premier);
    // dd($produits);

       // dd($produits500);

       // dd($produits);
      //  $produit = new Produit;

       // $produit->designation = "Livre";
       // $produit->description ="La description du livre";
       // $produit->prix = 1000;
       // $produit->save();
       // dd($produit);

        return view("frontoffice.produits.index", [
            "produits"=>$produits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Categorie::all();
        $produit = new Produit;
       return view("frontoffice.produits.create", [
           "categories" => $categories,
           "produit" => $produit,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // dd($request->file("image"));
       $imageName = "produit.png";
;
       if($request->file("image")){

        $imageName = time()
.$request->file("image")->getClientOriginalName();

$request->file("image")->storeAs("public/uploads/produits" ,  $imageName);



       }

       $request->session()->put('imageName' , $imageName);
       session([


       ]);

        $produits = Produit::create([
            "designation" => $request->designation,
            "prix" => $request->prix,
            "categorie_id" => $request->categorie_id,
            "description" => $request->description,
            "image" => $imageName,
        ]);

$user = User::first();

if($user)

Mail::to($user)->send(new ProduitAjoute);

        //dd($produits);

        return redirect()->route("produits.index")->with("statut", "le produit a bien été ajouté!");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
       // $produits = Produit::first();
       // dd("id");

       $categories = Categorie::all();

        return view("frontoffice.produits.edit", [
            "produit" => $produit,
            "categories"=> $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $request->validate([

        //     "designation" => "required|min::3|max:35|unique:produits.designation,".$this->produit->id,
        //     "prix" => "required|digits_between:3,1000000",
        //     "description" => "required|max:200",
        //     "categorie_id" => "required|numeric",
        // ]);

        Produit::where("id" ,$id)->update([

            "designation" => $request->designation,
            "prix" => $request->prix,
            "categorie_id" => $request->categorie_id,
            "description" => $request->description,
        ]);

        $user = User::first();

        $user->notify(new ModificationProduit);

        return redirect()->route("produits.index")->with("statut", "Le produit a bien édité");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);

        return redirect()->route("produits.index")->with("statut", "Le produit a bien supprimé");
    }
}
