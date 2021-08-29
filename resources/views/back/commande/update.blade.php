@extends('back.standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('commande_update',$object->id) }}@else{{ route('commande_store') }}@endif">
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
            <select class="form-control" id="client" name="client">
              <option value=""></option>
              @foreach( $clients as $client )
              <option value="{{ $client->id }}" @if($object->id && $object->id == $client->id ) selected="selected" @endif>{{ $client }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Coupon</label>
            <select class="form-control" id="client" name="client">
              <option value=""></option>
              @foreach( $coupons as $coupon )
              <option value="{{$coupon->id}}" @if($object->id && $object->id == $coupon->id ) selected="selected" @endif>{{ $coupon }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Total</label>
            <input type="text" class="form-control" name="total" id="total" value="@if($object->id){{ $object->total }}@else{{ old('total') }}@endif">
          </div>
        </div>

      </div>
    </div>
    <div class="card-footer text-right">
      @include('layout.update-actions')
    </div>
  </form>

@endsection