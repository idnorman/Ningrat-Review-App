<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mst_menu_slider', function (Blueprint $table) {
            $table->bigIncrements('ID_SLIDER');
            $table->unsignedBigInteger('ID_MENU');
            $table->string('FOTO_SLIDER');
            $table->timestamps();

            // Foreign Key
            $table->foreign('ID_MENU')
                  ->references('ID_MENU')
                  ->on('mst_menus')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_sliders');
    }
};
