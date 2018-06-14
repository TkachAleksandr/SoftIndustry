<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('list_label_id')->unsigned();
            $table->string('value', 255)->nullable()->default(null);
            $table->string('label', 255);
            $table->timestamps();
        });

        Schema::table('list_items', function (Blueprint $table) {
            $table->foreign("list_label_id")->references("id")->on("list_labels")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_items');
    }
}
