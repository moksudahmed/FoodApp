<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->enum('status', ['pending', 'delivered']);
            $table->timestamp('order_date')->useCurrent();
            $table->string('delivery_address');
            $table->decimal('total_price', 10, 2);
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
