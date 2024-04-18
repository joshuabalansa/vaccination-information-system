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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('body_weight');
            $table->string('body_length');
            $table->string('address');
            $table->string('gravida');
            $table->string('para');
            $table->string('abortion');
            $table->string('live_birth');
            $table->string('death');
            $table->string('philhealth')->nullable();
            $table->string('4ps_number')->nullable();
            $table->string('mother_maiden_name');
            $table->date('mother_birth_date');
            $table->string('mother_age');
            $table->string('mother_occupation');
            $table->string('father_name')->nullable();
            $table->date('father_birth_date')->nullable();
            $table->string('father_age')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('phone_number')->nullable();
            $table->time('appointment_time')->nullable();
            $table->date('appointment_date')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
