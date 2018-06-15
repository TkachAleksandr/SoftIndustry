<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCharacteristics extends Model
{
    protected $fillable = [
        "user_id",
        "list_item_id",
        "mark",
    ];

    protected $appends = [
        "label",
    ];

    public function getLabelAttribute() {
        if (!is_null($this->attributes["list_item_id"])) {
            return ListItem::find($this->attributes["list_item_id"])->label;
        } else {
            return null;
        }
    }
}
