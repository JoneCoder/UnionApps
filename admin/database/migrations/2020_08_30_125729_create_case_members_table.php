<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_members', function (Blueprint $table) {
            $table->integer('case_id')->unsigned();
            $table->string('badi_name', 100);
            $table->string('badi_father_name', 100);
            $table->string('badi_village', 100);
            $table->string('bibadi_name', 100);
            $table->string('bibadi_father_name', 100);
            $table->string('bibadi_village', 100);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->string('created_by_ip', 20);
            $table->string('updated_by_ip', 20)->nullable();
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
        Schema::dropIfExists('case_members');
    }
}
