<?php

namespace App\Exports;
use App\Models\Produit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduitExport implements FromView
 {
    /**
    * @return \Illuminate\Support\Collection
    */


    public function view():View{

    return view("partials.list-produits",[
        "produits" => Produit::all(),
    ]);

    }

 }


