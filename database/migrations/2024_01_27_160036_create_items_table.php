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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("donor_id")->constrained("users")->cascadeOnDelete();
            $table->foreignId("receiver_id")->nullable();
            $table->string("name");
            $table->string("category")->nullable();
            $table->string("item_condition");
            $table->text("description")->nullable();
            $table->string("image")->nullable();
            $table->enum("status", ["AVAILABLE", "DONATED"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
