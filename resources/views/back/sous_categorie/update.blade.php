@extends('back.standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('souscategorie_update',$object->id) }}@else{{ route('souscategorie_store') }}@endif">
    {{ csrf_field() }}
    <div class="card-body">
      <h3 class="card-title">
        @if($object->id)
          Modifier la sous catégorie
        @else
          Créer une sous catégorie
        @endif

      </h3>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Nom de la sous catégorie</label>
            <textarea class="form-control" name="label" id="label" cols="30" rows="10">@if($object->id){{ $object->label }}@else{{ old('label') }}@endif</textarea>
          </div>
        </div>
      <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Catégorie</label>
            <select class="form-control" id="categorie_id" name="categorie" required="">
              @foreach( $categories as $categorie )
              <option value="{{ $categorie->id }}" @if($object->id && $object->categorie_id == $categorie->id ) selected="selected" @endif>{{ $categorie }}</option>
              @endforeach
            </select>
          </div>
        </div>
    </div>
    <div class="card-footer text-right">
      @include('layout.update-actions')
    </div>
  </form>

@endsection