<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->string('id',22)->unique();
            $table->string('alias');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('distance');
            $table->string('image_url');
            $table->string('is_claimed');
            $table->string('is_closed');
            $table->string('date_opened');
            $table->string('date_closed');
            $table->string('name',64);
            $table->string('phone',14);
            $table->string('display_phone');
            $table->integer('photo_count');
            $table->string('price');
            $table->integer('rating');
            $table->integer('review_count');
            $table->string('transactions');
            $table->string('yelp_menu_url');
            $table->string('categorie_id');
            $table->integer('location_id');
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
        Schema::dropIfExists('business');
    }
}
