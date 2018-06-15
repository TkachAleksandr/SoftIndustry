<?php

namespace App\Http\Controllers;

use App\Classes\Constants;
use App\Http\Requests\Employee\saveNewEmployeeRequest;
use App\User;
use App\UserCharacteristics;
use App\UserProject;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  saveNewEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveNewEmployeeRequest $request)
    {
        $user = new User();
        $user->surname = $request->input("surname");
        $user->name = $request->input("name");
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

        if (!is_null($project)) {
            foreach ($project as $item) {
                $project = new UserProject();
                $project->user_id = $user->id;
                $project->list_item_id = $item["id"];
                $project->save();
            }

        }

        return response()->json([],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
