<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // On crée le schéma pour la base de données
        Schema::create('sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 2);
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
        // Si la table sizes on la supprime de la base de données
        Schema::dropIfExists('sizes');
    }
}
