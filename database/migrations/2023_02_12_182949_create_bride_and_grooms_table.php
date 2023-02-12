<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrideAndGroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bride_and_grooms', function (Blueprint $table) {
            $table->id();
            $table->string('bride');
            $table->string('groom');
            $table->string('bride_after');
            $table->string('bride_from');
            $table->string('groom_from');
            $table->string('bride_phone');
            $table->string('groom_phone');
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
        Schema::dropIfExists('bride_and_grooms');
    }
}
