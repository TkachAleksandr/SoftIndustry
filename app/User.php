<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        "name", "email", "password",
    ];

    protected $hidden = [
        "password", "remember_token",
    ];

    protected $appends = [
        "full_name",
        "amount_projects",
    ];

    public function getFullNameAttribute() {
        return $this->attributes["surname"] . " " . $this->attributes["name"] . " " .$this->attributes["middle_name"];
    }

    public function characteristics() {
        return $this->hasMany("App\UserCharacteristics");
    }

    public function getAmountProjectsAttribute() {
        return (UserProject::where("user_id", $this->attributes["id"])->get())->count();
    }
}

