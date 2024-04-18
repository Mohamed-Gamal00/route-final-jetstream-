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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name'); // customers name if user not logged in
            $table->string('email'); // customers name if user not logged in
            $table->string('phone')->nullable();

            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();

            $table->string('shipping_method');
            $table->decimal('shipping_amount',8,2)->nullable(); // بتاخد اد ايه عالشحن

            $table->decimal('tax_amount',8,2)->nullable();
            $table->decimal('total',8,2);

            $table->string('payment_method'); // payment used for the order
            $table->string('payment_status')->default('pending'); // payment status for the order

            $table->string('status')->default('pending'); //Order status

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
