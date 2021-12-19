<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',60);
            $table->string('final_product',60);
            $table->text('summary')->nullable();
            $table->string('researcher',60);
            $table->string('created_by',60);
            $table->string('update_by',60);
            $table->string('delete',60);
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
        Schema::dropIfExists('research');
    }
}
