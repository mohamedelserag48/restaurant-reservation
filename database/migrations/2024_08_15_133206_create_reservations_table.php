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
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("dining_table_id");
            $table->unsignedBigInteger("customer_id");
            $table->time("from_time");
            $table->time("to_time");
            $table->date("date");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("dining_table_id")->references("id")->on("dining_tables")
                ->onDelete("cascade")->onUpdate("cascade");

            $table->foreign("customer_id")->references("id")->on("customers")
                ->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
