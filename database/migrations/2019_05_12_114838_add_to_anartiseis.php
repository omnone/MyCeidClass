<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToAnartiseis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anartiseis', function (Blueprint $table) {
            $table->integer('lesson_id');
            $table->integer('user_id');
            $table->string('title');
            $table->mediumText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anartiseis', function (Blueprint $table) {
            //
        });
    }
}
