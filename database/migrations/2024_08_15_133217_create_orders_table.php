<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("reservation_id");
            $table->unsignedBigInteger("dining_table_id");
            $table->float("total");
            $table->float("taxes")->nullable();
            $table->float("service")->nullable();
            $table->boolean("paid")->default(false);
            $table->dateTime("date");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("reservation_id")->references("id")->on("reservations");
            $table->foreign("dining_table_id")->references("id")->on("dining_tables");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
