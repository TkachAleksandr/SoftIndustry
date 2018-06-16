<?php

namespace App\Http\Controllers;

use App\Classes\Constants;
use App\Http\Requests\Employee\saveNewEmployeeRequest;
use App\User;
use App\UserCharacteristics;
use App\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_input = $request->input("searchInput");
        if (!is_null($search_input)) {
            $users = User::with(["characteristics"])
                ->orWhere('surname', 'LIKE', '%'.$search_input.'%')
                ->orWhere('name', 'LIKE', '%'.$search_input.'%')
                ->orWhere('middle_name', 'LIKE', '%'.$search_input.'%')
                ->get();
        } else {
            $users = User::with(["characteristics"])->get();
        }

        $total_characteristics = UserCharacteristics::groupBy("list_item_id")
            ->selectRaw("SUM(mark) /". $users->count() ." as sum, list_item_id")->get();

        return response()->json([
            "data" => $users,
            "total_characteristics" => $total_characteristics,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  saveNewEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveNewEmployeeRequest $request)
    {
        $path = null;
        if ($request->has("file")) {
            $file = $request->file('file');
            if (!is_null($file)) {
                $name_unique = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs(Constants::PATH_FILES, $name_unique);
                $path = Storage::url($path);
            }
        }

        $user = new User();
        $user->surname = $request->input("surname");
        $user->name = $request->input("name");
        $user->photo_path = $path;
        $user->middle_name = $request->input("middle_name");
        $user->save();

        $characteristics = [
            [
                "characteristic" => Constants::ID_LIST_ITEM_SOCIABILITY,
                "mark" => $request->input("sociability"),
            ], [
                "characteristic" => Constants::ID_LIST_ITEM_ENGINEERING_SKILLS,
                "mark" => $request->input("engineering_skills"),
            ], [
                "characteristic" => Constants::ID_LIST_ITEM_TIME_MANAGEMENT,
                "mark" => $request->input("time_management"),
            ],[
                "characteristic" => Constants::ID_LIST_ITEM_KNOWLEDGE_LANGUAGES,
                "mark" => $request->input("knowledge_languages"),
            ],
        ];

        foreach ($characteristics as $item) {
            $characteristics = new UserCharacteristics();
            $characteristics->user_id = $user->id;
            $characteristics->list_item_id = $item["characteristic"];
            $characteristics->mark = $item["mark"];
            $characteristics->save();
        }

        $project = $request->input("projects");

        if ($project !== "null") {
            foreach ($project as $item) {
                if (isset($item["id"])) {
                    $project = new UserProject();
                    $project->user_id = $user->id;
                    $project->list_item_id = $item["id"];
                    $project->save();
                }
            }
        }

        return response()->json($user->id,200);
    }
}
