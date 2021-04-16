
        <div>
             <a href="{{ route('produits.create') }}" class="btn btn-sm btn-success"> <i class="fas fa-plus"></i>Ajouter</a>
             
        </div>

        <table class="table">
           <thead>
               <tr>
                   <th>Designation</th>

                   <th>Prix</th>
                   <th>Description</th>
                   <th>Categorie</th>


               </tr>
           </thead>
           <tbody>
               @foreach ($produits as $produit)
               <tr>

                <td>{{ $produit->designation }}</td>
                <td>{{ formatPrixBf ($produit->prix) }}</td>
                <td>{{ $produit->description }}</td>
                <td>{{ $produit->categorie ? $produit->categorie->libelle : "Non catégorisé"}}</td>





            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
               @endforeach

           </tbody>
       </table>
