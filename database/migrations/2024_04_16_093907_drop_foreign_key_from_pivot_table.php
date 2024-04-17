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
        Schema::table('pivot_fournisseur_articles', function (Blueprint $table) {
            Schema::table('pivot_fournisseur_articles', function (Blueprint $table) {
                $table->dropForeign('pivot_fournisseur_articles_fournisseur_id_foreign');
                $table->dropForeign('pivot_fournisseur_articles_article_id_foreign');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pivot_fournisseur_articles', function (Blueprint $table) {
            //
        });
    }
};
