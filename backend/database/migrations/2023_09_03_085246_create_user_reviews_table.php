<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamp('review_date')->useCurrent();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_reviews');
    }
}
