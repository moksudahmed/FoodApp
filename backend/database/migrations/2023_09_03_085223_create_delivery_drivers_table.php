<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryDriversTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('vehicle_info')->nullable();
            // Add any other driver-related fields as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_drivers');
    }
}
