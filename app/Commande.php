<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['client','coupon','total'];

    public function gettotal(){
        return $this->total;
    }

    public function getclient(){
        return ($this->client) ? $this->clientRelation->__toString() : "";
    }

     public function getcoupon(){
        return ($this->coupon) ? $this->couponRelation->__toString() : "";
    }

    public function clientRelation(){
        return $this->belongsTo('App\Client','client','id');
    }

    public function couponRelation(){
        return $this->belongsTo('App\Coupon','coupon','id');
    }

    public function __toString(){
        return ( $this->id ) ? $this->client  : "";
    }

    public function __toHtml(){
        return ( $this->id ) ? '<a href="'.route('commande_edit',$this->id).'" target="_blank">'.$this->commande.'</a>' : "";
    }
}
