<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('styliste_id');
            $table->string('nom');
            $table->text('description');
            $table->decimal('prix', 10, 2);
            $table->string('categorie');
            $table->integer('delai_confection');
            $table->json('photos')->nullable();
            $table->timestamps();

            $table->foreign('styliste_id')->references('id')->on('stylistes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produits');
    }
}