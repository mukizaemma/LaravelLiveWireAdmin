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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->foreignId('clinical_department_id')
                ->constrained('clinical_departments')
                ->cascadeOnDelete();

            $table->string('full_name');
            $table->string('position');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('biography')->nullable();

            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
