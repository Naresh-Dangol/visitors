<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('visitor_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visitors_id')->unsigned();
            $table->string('visiting_date')->nullable();
            $table->string('visiting_time')->nullable();
            $table->text('satisfied_reason')->nullable();
            $table->text('unsatisfied_reason')->nullable();
            $table->enum('status',['yes','no']); 
            $table->foreign('visitors_id')->references('id')->on('visitors')->onDelete('Cascade');  
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitor_details');
    }
}
