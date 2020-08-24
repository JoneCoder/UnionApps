<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unsigned()->unique();
            $table->integer('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->integer('upazila_id')->unsigned();
            $table->foreign('upazila_id')->references('id')->on('upazilas');
            $table->integer('postoffice_id')->unsigned();
            $table->foreign('postoffice_id')->references('id')->on('postoffices');
            $table->integer('union_id')->unsigned();
            $table->foreign('union_id')->references('id')->on('unions');

            $table->string('name', 100);
            $table->string('bn_name', 100);
            $table->string('village', 100);
            $table->string('subdomain', 100);
            $table->string('mobile', 20);
            $table->string('email', 100)->nullable();
            $table->string('main_logo', 50)->nullable();
            $table->string('brand_logo', 50)->nullable();
            $table->string('jolchap', 50)->nullable();
            $table->boolean('print')->default(false);
            $table->longText('about', 300);
            $table->text('map', 300);
            $table->boolean('status')->default(true);
            $table->integer('created_by', 10);
            $table->integer('created_by', 10);
            $table->integer('updated_by', 10);
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
        Schema::dropIfExists('information');
    }
}
