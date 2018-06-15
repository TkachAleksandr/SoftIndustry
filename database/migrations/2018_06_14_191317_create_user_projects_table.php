<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('list_item_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('user_projects', function (Blueprint $table) {
           $table->foreign("user_id")->references("id")->on("users")->onUpdate("cascade");
           $table->foreign("list_item_id")->references("id")->on("list_items")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_projects', function (Blueprint $table) {
            $table->dropForeign(["user_id"]);
            $table->dropForeign(["list_item_id"]);
        });

        Schema::dropIfExists('user_projects');
    }
}
