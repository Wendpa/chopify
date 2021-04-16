@csrf
    
<div class="form-group">
  <label for="">Designation
  <input type="text"  value="{{ old("designation") ?? $produit->designation }}"  name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
  @error('designation')
  <small class="text-muted text-danger">{{ $message }}</small>
  @enderror
</div>


<div class="form-group">
    <label for="">Prix</label>
    <input value="{{ old("prix") ?? $produit->prix }}" type="number" name="prix" id="prix" class="form-control" placeholder="" aria-describedby="helpId">
    @error('prix')
    <small class="text-muted text-danger">{{ $message }}</small>
    @enderror
  </div>

<div class="form-group">
  <label for="category_id">Categorie</label>
  <select class="form-control" name="categorie_id" id="">

    @foreach ($categories as $categorie)
    <option {{ ($produit->categorie_id==$categorie->id OR old('categorie_id')==$categorie->id) ? "selected":"" }}  value="{{ old("categorie_id") ?? $produit->categorie_id }}">{{ $categorie->libelle }}</option>
        
    @endforeach
   
  </select>
</div>
<div class="form-group">
  <label for="description">Description</label>
  <textarea class="form-control" name="description" id="" rows="3">{{$produit->description }}</textarea>
  @error('description')
  <small class="text-muted text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="form-group">

  <label for="">

  </label>
  <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
  <small id="fileHelpId" class="form-text text-muted">selectionnez une image</small>
</div>
<button type="submit" class="btn btn-primary ">Valider</button>
