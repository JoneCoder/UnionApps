<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('union_id')->unsigned();
            $table->foreign('union_id')->references('id')->on('unions');
            $table->integer('postoffice_id')->unsigned();
            $table->foreign('postoffice_id')->references('id')->on('postoffices');
            $table->string('name', 100);
            $table->string('bn_name', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villages');
    }
}
