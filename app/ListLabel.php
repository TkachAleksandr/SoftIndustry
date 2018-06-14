<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListLabel extends Model
{
    protected $fillable = [
        "value",
        "label",
    ];
}
