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
        Schema::create('nominations', function (Blueprint $table) {
        $table->id();
        $table->string('company_name');
        $table->string('contact_person');
        $table->string('designation')->nullable();
        $table->string('email');
        $table->string('phone')->nullable();
        $table->string('country');
        $table->string('industry_sector')->nullable();
        $table->text('company_description')->nullable();
        $table->string('website')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nominations');
    }
};
