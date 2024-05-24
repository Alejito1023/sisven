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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->char('document_number',15)->unique();
            $table->char('firts_name',50)->nullable();
            $table->char('last_name',50)->nullable();
            $table->char('address',80);
            $table->date('birthday');
            $table->char('phone_number',16);
            $table->char('email',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_customers');
    }
};
