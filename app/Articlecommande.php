<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articlecommande extends Model 
{
    protected $fillable = ['id_cmd','id_article','qty'];
}
