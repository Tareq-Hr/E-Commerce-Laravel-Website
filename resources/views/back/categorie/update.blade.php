@extends('back.standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('categorie_update',$object->id) }}@else{{ route('categorie_store') }}@endif">
    {{ csrf_field() }}
    <div class="card-body">
      <h3 class="card-title">
        @if($object->id)
          Modifier la catégorie
        @else
          Créer une catégorie
        @endif

      </h3>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Nom de catégorie</label>
            <input type="text" class="form-control" name="categorie" id="categorie" value="@if($object->id){{ $object->categorie }}@else{{ old('categorie') }}@endif">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Catégorie parent</label>
            <select class="form-control" id="parent" name="parent">
              <option value=""></option>
              @foreach( $categories as $categorie )
              <option value="{{ $categorie->id }}" @if($object->id && $object->parent == $categorie->id ) selected="selected" @endif>{{ $categorie }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-right">
      @include('layout.update-actions')
    </div>
  </form>

@endsection