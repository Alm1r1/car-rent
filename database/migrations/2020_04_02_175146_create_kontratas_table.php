<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontratasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontratas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('starting_date');
            $table->date('ending_date');
            $table->integer('total');
            $table->boolean('is_closed');
            
            $table->unsignedBigInteger('user_id');//foreign key
            $table->unsignedBigInteger('makina_id');//foreign key
            
            $table->foreign('user_id')
                ->references('id')                 
                ->on('users');
            
            $table->foreign('makina_id')
                ->references('id')                 
                ->on('makinas');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontratas');
    }
}
