<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bins', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->integer('user_id');
            $table->string('license_no');
            $table->date('violation_date');
            $table->string('violation_type');
            $table->text('image'); 
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
        Schema::dropIfExists('bins');
    }
}
