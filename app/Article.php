<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = [
        'titre','contenu','categorie','tags', 'inventaire', 'taille', 'poids', 'couleur', 'materiau', 'reference','prix_vente','prix_promo', 'lien', 'image', 'image1', 'image2', 'image3', 'image4', 'image5'
    ];

    protected $appends = array('image_link');

    public function __toString(){
        return ( $this->id ) ? $this->titre : "";
    }
   	
    public function gettitre(){
        return $this->titre;
    }

    public function categorieRelation(){
        return $this->belongsTo('App\Categorie','categorie','id');
    }
    
    public function getcategorie(){
        return $this->categorieRelation->__toString();
    }
    
    public function getcontenu(){
        return $this->contenu;
    }

    public function gettags(){
        return $this->tags;
    }

    public function getlongueur(){
        return $this->longueur;
    }

    public function getlargeur(){
        return $this->largeur;
    }

    public function getpoids(){
        return $this->poids;
    }

    public function getlitrage(){
        return $this->litrage;
    }

    public function getprix_vente(){
        return $this->prix_vente;
    }

    public function getprix_promo(){
        return $this->prix_promo;
    }

    public function getinventaire(){
        return $this->inventaire;
    }

    public function getmodele(){
        return $this->modele;
    }

    public function getvitesse(){
        return $this->vitesse;
    }

    public function getfabricant(){
        return $this->fabricant;
    }

    public function getcouleur(){
        return $this->couleur;
    }

    public function getcreated_at(){
        return $this->created_at;
    }
    
    public function getDate(){
        $dt = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);

        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    

        return $months[$dt->format('M')] . "<span>". $dt->format('d')."</span>". $dt->format('Y');
    }
    
    public function createdBy(){
        return $this->belongsTo('App\User','auteur','id');
    }
    
    public function imageRelation(){
        return $this->belongsTo('App\Media','image','id');
    }

    public function image1Relation(){
        return $this->belongsTo('App\Media','image1','id');
    }

    public function image2Relation(){
        return $this->belongsTo('App\Media','image2','id');
    }

    public function image3Relation(){
        return $this->belongsTo('App\Media','image3','id');
    }

    public function image4Relation(){
        return $this->belongsTo('App\Media','image4','id');
    }

    public function image5Relation(){
        return $this->belongsTo('App\Media','image5','id');
    }

    public function getImage(){
        return ($this->imageRelation) ? $this->imageRelation->picture() : "";
    }

    public function getImage1(){
        return ($this->image1Relation) ? $this->image1Relation->picture() : "";
    }

    public function getImage2(){
        return ($this->image2Relation) ? $this->image2Relation->picture() : "";
    }

    public function getImage3(){
        return ($this->image3Relation) ? $this->image3Relation->picture() : "";
    }

    public function getImage4(){
        return ($this->image4Relation) ? $this->image4Relation->picture() : "";
    }

    public function getImage5(){
        return ($this->image5Relation) ? $this->image5Relation->picture() : "";
    }

    public function getImageLink(){
        return ($this->imageRelation) ? $this->imageRelation->link() : "";
    }

    public function getImage1Link(){
        return ($this->image1Relation) ? $this->image1Relation->link() : "";
    }

    public function getImage2Link(){
        return ($this->image2Relation) ? $this->image2Relation->link() : "";
    }

    public function getImage3Link(){
        return ($this->image3Relation) ? $this->image3Relation->link() : "";
    }

    public function getImage4Link(){
        return ($this->image4Relation) ? $this->image4Relation->link() : "";
    }

    public function getImage5Link(){
        return ($this->image5Relation) ? $this->image5Relation->link() : "";
    }

    public function getImageLinkAttribute(){
        return ($this->imageRelation) ? $this->imageRelation->link() : "";
    }

    public function getexcerpt( $length = 80 ) {
        $more = '...';
        $excerpt = strip_tags( trim( $this->contenu  ) );
        $words = str_word_count( $excerpt, 2 );
        
        return substr($excerpt, 0, 200) . $more;

        /*if ( count( $words ) > $length ) {
            $words = array_slice( $words, 0, $length, true );
            end( $words );
            //$position = key( $words ) + strlen( current( $words ) );
            //$excerpt = substr( $excerpt, 0, $position ) . $more;
        }
        return $excerpt;*/
    }
}
