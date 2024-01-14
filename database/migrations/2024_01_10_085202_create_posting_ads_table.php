<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posting_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('category');
            $table->string('city');
            $table->string('address');
            $table->string('postal_code');
            $table->string('place');
            $table->string('age');
            $table->string('title');
            $table->string('description');

            $table->string('search_tag__ethnicity');
            $table->string('search_tag__nationality');
            $table->string('search_tag__breast');
            $table->string('search_tag__hair');
            $table->string('third_model_name');
            $table->string('search_tag__body_type');
            $table->string('search_tag__services');
            $table->string('search_tag__attention_to');
            $table->string('search_tag__place_of_service');
            $table->string('hourly_price');
            $table->string('search_tag__payment_methods');
            $table->string('contact_method');
            $table->string('email');
            $table->string('telephone');
            $table->string('ads_photos');
            $table->string('ads_type');
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
        Schema::dropIfExists('posting_ads');
    }
};
