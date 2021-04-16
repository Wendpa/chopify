use App\Models\Categorie;
<x-masterlayout>


    <div class="container">

<div class="row">
        

<div class="col-md-12 mt-4">
    <h1 class="text-center"> Ajouter produit</h1>
 

</div>
<div class="col-md-6 offset-md-3">

<form method="post" action="{{ route('produits.update', $produit->id) }}">
    
  @method("PUT")
 
  @include('partials._produit-form')


    

</form>
</div>


</div>
</div>
</x-masterlayout>