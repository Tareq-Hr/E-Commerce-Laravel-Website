<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['titre', 'contenu'];

    public function gettitre(){
    	return $this->titre;
    }

    public function getcontenu(){
    	return $this->contenu;
    }
}
