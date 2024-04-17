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
        Schema::table('articles', function (Blueprint $table) {
            //
            // Supprimer la clé étrangère depot_id
            $table->dropForeign(['depot_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('articles', function (Blueprint $table) {
            // Ajouter à nouveau la clé étrangère depot_id
            $table->foreign('depot_id')->references('id')->on('depots')->onDelete('cascade');
        });
    }
};
