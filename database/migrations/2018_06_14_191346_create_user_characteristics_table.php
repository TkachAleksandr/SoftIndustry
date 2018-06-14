<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('list_items_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('user_characteristics', function (Blueprint $table) {
            $table->foreign("user_id")->references("id")->on("users")->onUpdate("cascade");
            $table->foreign("list_items_id")->references("id")->on("list_items")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_characteristics', function (Blueprint $table) {
            $table->dropForeign(["user_id"]);
            $table->dropForeign(["list_items_id"]);
        });

        Schema::dropIfExists('user_characteristics');
    }
}
