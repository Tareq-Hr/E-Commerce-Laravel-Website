@extends('back.standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('coupon_update',$object->id) }}@else{{ route('coupon_store') }}@endif">
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
            <label class="form-label">Nom du Coupon</label>
            <input type="text" class="form-control" name="titre" id="titre" value="@if($object->id){{ $object->titre }}@else{{ old('titre') }}@endif">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Code Promo</label>
            <input type="text" class="form-control" name="coupon" id="coupon" value="@if($object->id){{ $object->coupon }}@else{{ old('coupon') }}@endif">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Remise</label>
            <input type="double" class="form-control" name="remise" id="remise" value="@if($object->id){{ $object->remise }}@else{{ old('remise') }}@endif">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Date Début</label>
            <input type="date" class="form-control" name="date_debut" id="date_debut" value="@if($object->id){{ $object->date_debut }}@else{{ old('date_debut') }}@endif">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Date Fin</label>
            <input type="date" class="form-control" name="date_fin" id="date_fin" value="@if($object->id){{ $object->date_fin }}@else{{ old('date_fin') }}@endif">
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-right">
      @include('layout.update-actions')
    </div>
  </form>

@endsection