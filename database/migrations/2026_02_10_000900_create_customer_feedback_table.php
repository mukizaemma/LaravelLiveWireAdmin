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
        Schema::create('customer_feedback', function (Blueprint $table) {
            $table->id();

            // Visitor information
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Feedback content
            $table->longText('message');
            $table->longText('recommendations')->nullable();

            // Numeric rating out of 10
            $table->unsignedTinyInteger('rating_out_of_10')->nullable();

            // What is being rated
            $table->enum('rating_category', [
                'overall',
                'department',
                'service',
                'restaurant',
                'facility',
                'staff',
                'other',
            ])->default('overall');

            // Links to specific clinical entities when applicable
            $table->foreignId('clinical_department_id')
                ->nullable()
                ->constrained('clinical_departments')
                ->nullOnDelete();

            $table->foreignId('clinical_service_id')
                ->nullable()
                ->constrained('clinical_services')
                ->nullOnDelete();

            // For non-linked categories (e.g. restaurant, facility, other)
            $table->string('rated_target_label')->nullable();

            // Contact preferences
            $table->boolean('wants_response')->default(false);
            $table->enum('preferred_contact_method', ['none', 'email', 'phone', 'either'])
                ->default('none');

            // Optional display / feedback date (can be overridden by admin)
            $table->date('feedback_date')->nullable();

            // Moderation / publishing
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->timestamp('approved_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_feedback');
    }
};

