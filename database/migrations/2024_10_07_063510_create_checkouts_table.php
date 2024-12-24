<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            // $table->string('postal_code');
            // $table->enum('payment_method', ['credit_card', 'bank_transfer', 'paypal', 'cash_on_delivery']);
            $table->text('order_notes')->nullable(); // Optional notes
            $table->boolean('same_as_shipping')->default(true); // Billing address same as shipping
            $table->timestamps();
        });

        Schema::create('checkout_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checkout_id')->constrained()->onDelete('cascade'); // Link to checkout
            $table->string('name'); // Product name
            $table->decimal('price', 10, 2); // Product price
            $table->string('delivery_options'); // Delivery options
            $table->string('delivery_time'); // Delivery time
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->string('from');
            $table->string('to');
            $table->text('message')->nullable(); // Message from the buyer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
