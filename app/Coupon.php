<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
	protected $fillable = ['titre','coupon','remise','date_debut', 'date_fin'];

    public function __toString(){
        return ( $this->id ) ? $this->titre : "";
    }
   	
    public function gettitre(){
        return $this->titre;
    }

    /*
    public function categorieRelation(){
        return $this->belongsTo('App\Categorie','categorie','id');
    }
    
    public function getcategorie(){
        return $this->categorieRelation->__toString();
    }
    */
    public function getcoupon(){
        return $this->coupon;
    }

    public function getremise(){
        return $this->remise;
    }

    public function getdate_debut(){
        return $this->date_debut;
    }

    public function getdate_fin(){
        return $this->date_fin;
    }

    public function getcreated_at(){
        return $this->created_at;
    }
    
    public function getDate(){
        $dt = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);

        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    

        return $months[$dt->format('M')] . "<span>". $dt->format('d')."</span>". $dt->format('Y');
    }
    
}
