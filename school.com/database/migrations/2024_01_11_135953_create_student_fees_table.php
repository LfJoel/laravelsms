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
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('total_amount')->default(0);
            $table->integer('remaining_amount')->default(0);
            $table->integer('paid_amount')->default(0);
            $table->timestamps();
            $table->string('payment_type')->nullable();
            $table->text('remark')->nullable();
            $table->integer('created_by')->nullable();
            $table->tinyInteger('is_payment')->default(0);
            $table->text('payment_data')->nullable();
            $table->string('stripe_session_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fees');
    }
};
