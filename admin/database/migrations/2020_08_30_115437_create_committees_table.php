<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->integer('union_code')->unsigned()->unique();
            $table->string('name', 100)->unique();
            $table->string('description', 100);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('committees');
    }
}
