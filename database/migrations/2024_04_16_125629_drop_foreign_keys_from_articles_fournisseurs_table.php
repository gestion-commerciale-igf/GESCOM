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
        Schema::table('articles_fournisseurs', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['fournisseur_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles_fournisseurs', function (Blueprint $table) {
            //
        });
    }
};
