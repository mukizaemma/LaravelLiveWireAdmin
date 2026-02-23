<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->string('cta_background_image_path')->nullable()->after('home_background_image_path');
            $table->string('cta_title')->nullable()->after('cta_background_image_path');
            $table->longText('cta_description')->nullable()->after('cta_title');
        });
    }

    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->dropColumn(['cta_background_image_path', 'cta_title', 'cta_description']);
        });
    }
};
