<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{


    //Al realizar un appends, afecta de forma global la entidad
    /*
    protected $hidden = ["slug","created_at","updated_at"];
    protected $appends = ["post_slug","post_date"];

    */
    //
    public function user(){
    	return $this->belongsTo(User::class);
    }

    /*
    public function getPostSlugAttribute(){
        return ($this->slug);
    }

    public function getPostDateAttribute(){
        return (substr($this->created_at,0,10));
    }

    */
}


//SELECT 1 2 3 4 5 slug as post_slug FROM posts