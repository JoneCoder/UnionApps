<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->integer('union_code')->unsigned()->unique();
            $table->integer('committee_id')->unsigned()->default(0);
            $table->string('subject', 100);
            $table->string('Place', 100);
            $table->string('moderator', 100);
            $table->text('present_members');
            $table->text('decision');
            $table->string('document', 100);
            $table->date('date');
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
        Schema::dropIfExists('resolutions');
    }
}
