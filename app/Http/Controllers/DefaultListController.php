<?php

namespace App\Http\Controllers;

use App\Classes\Constants;
use App\ListItem;

class DefaultListController extends Controller
{
    public function getDefaultList()
    {
        $characteristics = ListItem::where("list_label_id", Constants::ID_LIST_LABEL_CHARACTERISTICS)->get();
        $projects = ListItem::where("list_label_id", Constants::ID_LIST_LABEL_PROJECTS)->get();

        return response()->json([
            "characteristics" => $characteristics,
            "projects" => $projects
        ], 200);
    }
}
