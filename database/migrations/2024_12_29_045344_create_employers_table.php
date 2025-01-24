<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('country');
            $table->string('place');
            $table->string('address');
            $table->string('po_box_no');
            $table->string('contact_person_1');
            $table->string('contact_number_1');
            $table->string('contact_person_2')->nullable();
            $table->string('contact_number_2')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('verification_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
