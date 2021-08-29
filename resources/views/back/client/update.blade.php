@extends('back.standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('client_update',$object->id) }}@else{{ route('client_store') }}@endif">
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
            <label class="form-label">CLient</label>
            <input type="text" class="form-control" name="nom" id="nom" value="@if($object->id){{ $object->nom }}@else{{ old('nom') }}@endif">
          </div>
        </div>

        
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Télephone</label>
            <input type="text" class="form-control" name="tel" id="tel" value="@if($object->id){{ $object->tel }}@else{{ old('tel') }}@endif">
          </div>
        </div>

        
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="@if($object->id){{ $object->email }}@else{{ old('email') }}@endif">
          </div>
        </div>

        
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Adresse</label>
            <input type="text" class="form-control" name="adresse" id="adresse" value="@if($object->id){{ $object->adresse }}@else{{ old('adresse') }}@endif">
          </div>
        </div>

        
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Ville</label>
            <input type="text" class="form-control" name="ville" id="ville" value="@if($object->id){{ $object->ville }}@else{{ old('ville') }}@endif">
          </div>
        </div>

        
      </div>
    </div>
    <div class="card-footer text-right">
      @include('layout.update-actions')
    </div>
  </form>

@endsection