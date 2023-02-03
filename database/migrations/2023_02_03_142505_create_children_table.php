<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id');
            $table->unsignedBigInteger('parent');
            $table->unsignedBigInteger('parent_b')->nullable();
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('parent')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('parent_b')->references('id')->on('guests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('children', function (Blueprint $table) {
            $table->dropForeign(['child_id']);
            $table->dropForeign(['parent']);
            $table->dropForeign(['parent_b']);
        });
    }
}
