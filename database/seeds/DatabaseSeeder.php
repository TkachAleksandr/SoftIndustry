<?php

use App\ListItem;
use App\ListLabel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $list_labels = [
            "characteristics",
            "projects",
        ];


        $id = 1;
        foreach ($list_labels as $item) {

            $filed = ListLabel::find($id);

            if (is_null($filed)) {

                $field = new ListLabel();
                $field->id = $id++;
                $field->label = $item;
                $field->save();
            }
        }

        $characteristics = [
            [
                "label" => "Sociability",
                "value" => "sociability",
            ],[
                "label" => "Engineering Skills",
                "value" => "engineeringSkills",
            ],[
                "label" => "Time Management",
                "value" => "timeManagement",
            ],[
                "label" => "Knowledge of languages",
                "value" => "knowledgeLanguages",
            ],
        ];

        $id = 1;
        $characteristics_id = 1;
        foreach ($characteristics as $item) {

            $filed = ListItem::find($id);

            if (is_null($filed)) {

                $field = new ListItem();
                $field->id = $id;
                $field->list_label_id = $characteristics_id;
                $field->label = $item["label"];
                $field->value = $item["value"];
                $field->save();
            }
            $id++;
        }

        $projects_id = 2;
        for ($key = 1; $id <= 19; $key++, $id++) {

            $filed = ListItem::find($id);

            if (is_null($filed)) {

                $field = new ListItem();
                $field->id = $id;
                $field->list_label_id = $projects_id;
                $field->label = "Проект " . $key;
                $field->save();
            }
        }

    }
}
