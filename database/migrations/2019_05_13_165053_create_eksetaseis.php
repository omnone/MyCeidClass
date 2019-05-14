<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEksetaseis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eksetaseis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lesson_id');
            $table->date('imerominia_eksetasis');
            $table->time('ora_eksetasis');
            $table->datetime('prothesmia_dilosis');
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
        Schema::dropIfExists('eksetaseis');
    }
}
