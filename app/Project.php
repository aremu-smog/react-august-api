<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        "name",
        "slug",
        "image_id",
        "image_url"
    ];

    protected $attributes = [
        "image_id"=>null,
        "image_url"=>null
    ];
}
