<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    protected $fillable = [
        "list_label_id",
        "value",
        "label",
    ];
}
