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

