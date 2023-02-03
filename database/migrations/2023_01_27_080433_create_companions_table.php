<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('companion_a');
            $table->unsignedBigInteger('companion_b');
            $table->timestamps();

            $table->foreign('companion_a')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('companion_b')->references('id')->on('guests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companions', function (Blueprint $table) {
            $table->dropForeign(['companion_a']);
            $table->dropForeign(['companion_b']);
        });
    }
}
