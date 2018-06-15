<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListLabel extends Model
{
    protected $fillable = [
        "value",
        "label",
    ];

    public function list_items() {
        return $this->hasMany("App\ListItem");
    }
}
