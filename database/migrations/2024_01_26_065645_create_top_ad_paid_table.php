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
        Schema::create('top_ad_paid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('top_ad_id'); // Assuming top_ad_id is a foreign key referencing another table
            $table->foreignId('user_id'); // Assuming user_id is a foreign key referencing the users table
            $table->decimal('amount', 10, 2); // Adjust the precision and scale according to your needs
            $table->string('schedule');
            $table->foreignId('ad_id'); // Assuming ad_id is a foreign key referencing another table
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
        Schema::dropIfExists('top_ad_paid');
    }
};
