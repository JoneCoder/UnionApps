<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->integer('union_code')->unsigned()->unique();
            $table->foreign('union_code')->references('code')->on('information');
            $table->string('title', 50);
            $table->string('caption');
            $table->string('photo', 50)->default('default-slide.jpg');
            $table->tinyInteger('sequence')->default(1);
            $table->boolean('status')->default(true);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->string('created_by_ip', 20);
            $table->string('updated_by_ip', 20);
            $table->softDeletes();
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
        Schema::dropIfExists('sliders');
    }
}
