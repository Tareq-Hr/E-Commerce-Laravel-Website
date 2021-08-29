@extends('back.standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('article_update',$object->id) }}@else{{ route('article_store') }}@endif">
    {!! csrf_field() !!}
    <div class="card-body">
      <h3 class="card-title">
        @if($object->id)
          Modifier l'article
        @else
          Créer une article
        @endif
      </h3>
      
        <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Titre</label>
            <input class="form-control" id="titre" name="titre" value="@if($object->id){{ $object->titre }}@else{{ old('titre') }}@endif" type="text" required="">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Catégorie de l'article</label>
            <select class="form-control" id="categorie_id" name="categorie" required="">
              <option value="@if($object->id){{ $object->categorie }}@else{{ old('categorie') }}@endif"></option>
              @foreach( $categories as $categorie )
              <option value="{{ $categorie->id }}" @if($object->id && $object->categorie_id == $categorie->id ) selected="selected" @endif>{{ $categorie->categorie }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Tags</label>
            <input class="form-control" id="tags" name="tags" value="@if($object->id){{ $object->tags }}@else{{ old('tags') }}@endif" type="text" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Prix de vente</label>
            <input class="form-control" id="prix_vente" name="prix_vente" value="@if($object->id){{ $object->prix_vente }}@else{{ old('prix_vente') }}@endif" type="double" placeholder="Ex : 1.82" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Prix Promotionnel</label>
            <input class="form-control" id="prix_promo" name="prix_promo" value="@if($object->id){{ $object->prix_promo }}@else{{ old('prix_promo') }}@endif" type="double" placeholder="Ex : 1.82" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Disponible</label>
            <select class="form-control" id="inventaire" name="inventaire">
              <option value="@if($object->id){{ $object->inventaire }}@else{{ old('inventaire') }}@endif"></option>
              <option value="Oui">Oui</option>
              <option value="Non">Non</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Taille (Longueur x Largeur x Hauteur cm) </label>
            <input class="form-control" id="taille" name="taille" value="@if($object->id){{ $object->taille }}@else{{ old('taille') }}@endif" type="text" placeholder="Ex : 20 x 20 x 20" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Poids (KG)</label>
            <input class="form-control" id="poids" name="poids" value="@if($object->id){{ $object->poids }}@else{{ old('poids') }}@endif" type="double" placeholder="Ex : 1.82" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Litrage</label>
            <input class="form-control" id="litrage" name="litrage" value="@if($object->id){{ $object->litrage }}@else{{ old('litrage') }}@endif" type="double" placeholder="Ex : 1.82" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Materiau Principal</label>
            <input class="form-control" id="materiau" name="materiau" value="@if($object->id){{ $object->materiau }}@else{{ old('materiau') }}@endif" type="text" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Couleur</label>
            <input class="form-control" id="couleur" name="couleur" value="@if($object->id){{ $object->couleur }}@else{{ old('couleur') }}@endif" type="text" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Référence</label>
            <input class="form-control" id="reference" name="reference" value="@if($object->id){{ $object->reference }}@else{{ old('reference') }}@endif" type="text" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Image Principal</label>
            @if($object->id){!! $object->getImage() !!}@endif
            <input class="form-control" id="photo" name="image" type="file">
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Image 1</label>
            @if($object->id){!! $object->getImage1() !!}@endif
            <input class="form-control" id="photo1" name="image1" type="file">
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Image 2</label>
            @if($object->id){!! $object->getImage2() !!}@endif
            <input class="form-control" id="photo2" name="image2" type="file">
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Image 3</label>
            @if($object->id){!! $object->getImage3() !!}@endif
            <input class="form-control" id="photo3" name="image3" type="file">
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Image 4</label>
            @if($object->id){!! $object->getImage4() !!}@endif
            <input class="form-control" id="photo4" name="image4" type="file">
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Image 5</label>
            @if($object->id){!! $object->getImage5() !!}@endif
            <input class="form-control" id="photo5" name="image5" type="file">
          </div>
        </div>

      <div class="col-md-12">
          <div class="form-group">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="15" id="contenu" name="contenu">@if($object->id){{ $object->contenu }}@else{{ old('contenu') }}@endif</textarea>
          </div>
      </div>

    </div>
  </div>

  <div class="card-footer text-right">
      <?php
	$class = get_class($object);
  $path = explode('\\', $class);
	$create_p__ = ( isset($create_params) ) ? $create_params : [];
	$object_class = array_pop($path);
	
?>

<button type="submit" id="save_btn" class="btn btn-success">
  <i class="fa fa-check"></i>&nbsp;
  Confirmer
</button>


  <a id="create_btn" class="btn btn-primary" href="{{ route(strtolower($object_class).'_create',$create_p__) }}">
    <i class="fa fa-plus"></i>&nbsp;
    Ajouter
  </a>

@if($object->id and isGranted($object_class) )
  <a href="{{ route(strtolower($object_class).'_delete',$object->id) }}" type="button" data-toggle="modal" data-target="#confirmdelete" class="btn btn-danger delete_btn">
    <i class="fa fa-times"></i>&nbsp;
    Supprimer
  </a>
@endif

{{-- @if($object->id and isGranted($object_class) )
  <a id="show_btn" class="btn btn-info" href="{{ route(strtolower($object_class).'_show',$object->id) }}">
  	<i class="fa fa-file-text-o"></i>&nbsp;
  	Afficher
  </a>
@endif --}}

@if( isGranted($object_class) )
  <a id="list_btn" class="btn" href="{{ route(strtolower($object_class)) }}">
  	<i class="fa fa-ban"></i>&nbsp;
    Annuler
  </a>
@endif
  </div>

</form>

@endsection