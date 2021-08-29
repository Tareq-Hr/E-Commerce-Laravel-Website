@extends('back.standard')

@section('content')
  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('user_update',$object->id) }}@else{{ route('user_store') }}@endif">
    {{ csrf_field() }}
    <div class="card-body">
      <h3 class="card-title">
        @if($object->id)
          {{ __('user.user_edit') }}
        @else
          {{ __('user.user_create') }}
        @endif
      </h3>
      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('user.name') }}</label>
            <input class="form-control" id="name" name="name" value="@if($object->id){{ $object->getname() }}@else{{ old('name') }}@endif" type="text" required="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('user.role') }}</label>
            
            <select id="role" name="role" class="form-control select_with_filter">
              <option value="EMPLOYE" @if($object->id && $object->getrole() == "EMPLOYE" ) selected="selected" @endif >EMPLOYE</option>
              <option value="ADMIN" @if($object->id && $object->getrole() == "ADMIN" ) selected="selected" @endif >ADMIN</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('user.email') }}</label>
            <input class="form-control" id="email" name="email" value="@if($object->id){{ $object->getemail() }}@else{{ old('email') }}@endif" type="email">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('user.password') }}</label>
            <input class="form-control" id="password" name="password" value="" type="password">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('user.avatar') }}</label>
            @if($object->id){!! $object->getavatar() !!}@endif
            <input class="form-contro" id="avatar" name="avatar" type="file">
          </div>
        </div>

      </div>
    </div>
    <div class="card-footer text-right">
      @include('layout.update-actions')
    </div>
  </form>

@endsection