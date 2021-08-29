<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nom','tel','email','adresse','ville'];

    public function getnom(){
        return $this->nom;
    }
    public function gettel(){
            return $this->tel;
        }
    public function getemail(){
            return $this->email;
        }
    public function getadresse(){
            return $this->adresse;
        }
    public function getville(){
            return $this->ville;
        }

    public function __toString(){
        return ( $this->id ) ? $this->nom  : "";
    }

    public function __toHtml(){
        return ( $this->id ) ? '<a href="'.route('client_edit',$this->id).'" target="_blank">'.$this->client.'</a>' : "";
    }
}
