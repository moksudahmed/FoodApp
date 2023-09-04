<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantMenusTable extends Migration
{
    public function up()
    {
        Schema::create('restaurant_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('category')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->unique(['restaurant_id', 'name']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurant_menus');
    }
}
