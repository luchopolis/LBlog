<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = [
        "user_id",
        "Full_Name",
        "avatar",
        "biography"
    ];
}
