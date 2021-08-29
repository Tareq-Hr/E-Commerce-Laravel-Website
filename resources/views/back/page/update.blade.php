@extends('back.standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('page_update',$object->id) }}@else{{ route('page_store') }}@endif">
    {{ csrf_field() }}
    <div class="card-body">
      <h3 class="card-title">
        @if($object->id)
          Modifier la page
        @else
          Créer une page
        @endif

      </h3>
      
        <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Titre</label>
            <input class="form-control" id="titre" name="titre" value="@if($object->id){{ $object->titre }}@else{{ old('titre') }}@endif" type="text" required="">
          </div>
        </div>
        
      <div class="col-md-12">
          <div class="form-group">
            <label class="form-label">Contenu</label>
            <textarea class="form-control" rows="15" id="contenu" name="contenu">@if($object->id){{ $object->contenu }}@else{{ old('contenu') }}@endif</textarea>
          </div>
      </div>

    </div>
  </div>
  <div class="card-footer text-right">
        @include('layout.update-actions')
  </div>
</form>

@endsection