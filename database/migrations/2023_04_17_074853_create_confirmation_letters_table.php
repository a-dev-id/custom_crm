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
        Schema::create('confirmation_letters', function (Blueprint $table) {
            $table->id();
            $table->integer('confirmation_number');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('villa_id');
            $table->integer('adult');
            $table->integer('child')->nullable();
            $table->string('total_charge')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('campaign_name')->nullable();
            $table->longText('campaign_benefit')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('title');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->longText('check_in_out')->nullable();
            $table->longText('terms_conditions')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmation_letters');
    }
};
