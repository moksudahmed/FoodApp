<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->timestamp('payment_date')->useCurrent();
            $table->decimal('amount', 10, 2);
            $table->string('payment_method', 50);
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_transactions');
    }
}
