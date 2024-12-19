<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $table->string('path');
            $table->string('filename');
            $table->string('mime_type');
            $table->unsignedInteger('size');
            $table->boolean('is_primary')->default(false);
            $table->timestamps();

            $table->foreign('produit_id')
                  ->references('id')
                  ->on('produits')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}