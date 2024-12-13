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
        $table->id();
        $table->unsignedBigInteger('room_id');
        $table->unsignedBigInteger('client_id');
        $table->date('start_date');
        $table->date('end_date');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->timestamps();

        // Optional: Add foreign key constraints separately after creating the tables
        $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->dropForeign('reservations_room_id_foreign');
    });
    Schema::dropIfExists('rooms');
}
};
