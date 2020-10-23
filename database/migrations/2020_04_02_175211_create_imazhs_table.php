<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImazhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imazhs', function (Blueprint $table) {
            $table->id();
            $table->string('img_path');

            $table->unsignedBigInteger('makina_id');//foreign key

            $table->foreign('makina_id')
                ->references('id')                 
                ->on('makinas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imazhs');
    }
}
