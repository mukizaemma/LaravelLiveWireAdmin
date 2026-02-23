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
        Schema::table('website_settings', function (Blueprint $table) {
            $table->string('about_heading')->nullable()->after('about_description');
            $table->string('about_values_subheading')->nullable()->after('about_heading');
            $table->longText('about_value_cards')->nullable()->after('about_values_subheading'); // JSON: [{name, description}]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->dropColumn(['about_heading', 'about_values_subheading', 'about_value_cards']);
        });
    }
};
