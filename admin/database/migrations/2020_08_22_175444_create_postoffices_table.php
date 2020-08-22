<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostofficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postoffices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('policestation_id')->unsigned();
            $table->foreign('policestation_id')->references('id')->on('policestations');
            $table->string('name', 25);
            $table->string('bn_name', 25);
            $table->integer('code')->unsigned();
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
        Schema::dropIfExists('postoffices');
    }
}
