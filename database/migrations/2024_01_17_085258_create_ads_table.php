<?php
// database/migrations/xxxx_xx_xx_create_ads_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('ad_type');
            $table->decimal('price', 8, 2);
            $table->text('detail');
            $table->boolean('publish')->default(false);
            $table->timestamp('schedule')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
