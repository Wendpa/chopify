<x-masterlayout title=" | Catalogue">


    <div class="container">

    <div class="row">


        <div class="col-md-12 mt-">
            <h1 class="text-center">Tous nos Produits</h1>
            <hr/>

        </div>


<div class="row">
    <div class="col-md-12">

        <div class="col-md-12">
            @if (session("statut"))



            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              {{ session("statut") }}
            </div>
            @endif

            <script>
              $(".alert").alert();
            </script>

        </div>
        <div>
         <a href="{{ route('produits.create') }}" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i>Ajouter</a>

        <a href="{{ route('produitsExports') }}" class="btn btn-sm btn-warning">
            <i class="fas fa-plus"></i>Exporter</a>

        </div>


        <table class="table">
           <thead>
               <tr>
                   <th>Designation</th>

                   <th>Prix</th>
                   <th>Description</th>
                   <th>Categorie</th>
                   <th>Actions</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($produits as $produit)
               <tr>

                <td>{{ $produit->designation }}</td>
                <td>{{ formatPrixBf ($produit->prix) }}</td>
                <td>{{ $produit->description }}</td>
                <td>{{ $produit->categorie ? $produit->categorie->libelle : "Non catégorisé"}}</td>
                <td>
                    <a href="{{ route("produits.edit", $produit) }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit    "></i></a>
                    <a href="#" class="btn btn-danger btn-sm" onClick="suppressionConfirm('{{ $produit->id }}')"><i class="fas fa-trash    "></i></a>

                    <form onclick="return confirm('Etes vous sûr de vouloir supprimer cet produit?')", id="{{ $produit->id }}" method="post" action="{{ route("produits.destroy", $produit->id) }}">
                        @csrf
                        @method("DELETE")

                    </form>
                </td>



            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
               @endforeach

           </tbody>
       </table>

       <div class="mt-5 d-flex justify-content-center">
       {{  $produits->links() }}

       </div>

    </div>

</div>


</div>
</div>
</x-masterlayout>
