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
        Schema::create('job_apply_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('applicant_location');
            $table->string('applicant_number');
            $table->string('applicant_email');
            $table->string('applicant_resume');
            $table->longText('applicant_coverletter');
            $table->foreignId('applicant_job_title')->constrained('job_openings', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_apply_forms');
    }
};
