<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['categorie','parent'];

    public function getcategorie(){
        return $this->categorie;
    }

    public function getparent(){
        return ($this->parent) ? $this->parentRelation->__toString() : "";
    }

    public function parentRelation(){
        return $this->belongsTo('App\Categorie','parent','id');
    }

    public function __toString(){
        return ( $this->id ) ? $this->categorie  : "";
    }

    public function __toHtml(){
        return ( $this->id ) ? '<a href="'.route('categorie_edit',$this->id).'" target="_blank">'.$this->categorie.'</a>' : "";
    }
}
