<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCharacteristics extends Model
{
    protected $fillable = [
       "user_id",
       "list_items_id",
    ];
}
