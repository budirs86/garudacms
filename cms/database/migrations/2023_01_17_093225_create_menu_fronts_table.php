<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_fronts', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id');
            $table->integer('created_by');
            $table->string('pic', 255)->nullable(false);
            $table->string('link', 255)->nullable(true);
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
        Schema::dropIfExists('menu_fronts');
    }
};
