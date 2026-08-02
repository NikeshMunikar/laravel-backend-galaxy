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
        Schema::create('intake_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('participant_address');
            $table->string('participant_email');
            $table->string('participant_contact_number');
            $table->string('participant_date_of_birth');
            $table->enum('participant_gender',['male', 'female', 'other']);
            $table->string('participant_support_hours');
            $table->longText('participant_desc_support');
            $table->string('participant_any_risk');

            $table->string('invoicing_particular_name');
            $table->string('invoicing_particular_email');
            $table->string('invoicing_particular_contact_number');
            $table->string('invoicing_plan_funding');

            $table->text('participant_living_situatuion');
            $table->enum('participant_current_behavioural_plan', ['yes', 'no'])->default('yes');
            $table->enum('participant_mobility_need_assistance', ['yes', 'no'])->default('yes');
            $table->enum('participant_mobility_independent', ['yes', 'no'])->default('yes');
            $table->text('participant_mobility_desc');

            $table->enum('participant_comm_need_assistance', ['yes', 'no'])->default('yes');
            $table->enum('participant_comm_perfer',['verbally','auslan','nonVerbally','gesture','iPad','other']);
            $table->longText('participant_comm_desc');
           
            $table->enum('participant_personal_care_need_assistance', ['yes', 'no'])->default('yes');
            $table->enum('participant_transfer_need_assistance', ['yes', 'no'])->default('yes');
            $table->enum('participant_eatinganddrinking_need_assistance', ['yes', 'no'])->default('yes');
            $table->enum('participant_continence_need_assistance', ['yes', 'no'])->default('yes');
            $table->text('participant_continence_desc');
            $table->enum('participant_cald_background_need_assistance', ['yes', 'no'])->default('yes');
            $table->text('participant_work_preferences_desc');

            $table->string('referrer_name');
            $table->string('referrer_org');
            $table->string('referrer_position');
            $table->string('referrer_contact_number');
            $table->string('referrer_email');
            $table->longText('referrer_remark');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intake_forms');
    }
};
