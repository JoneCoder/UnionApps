<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitteeMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committee_members', function (Blueprint $table) {
            $table->id();
            $table->integer('union_code')->unsigned()->unique();
            $table->integer('committee_id')->unsigned();
            $table->string('name', 100);
            $table->string('designation', 100);
            $table->string('mobile', 100);
            $table->string('address', 100);
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
        Schema::dropIfExists('committee_members');
    }
}
