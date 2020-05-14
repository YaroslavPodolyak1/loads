<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadsTable extends Migration
{
    public function up(): void
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_from_id');
            $table->unsignedBigInteger('city_to_id');
            $table->json('name');
            $table->string('volume', 20);
            $table->string('photo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loads');
    }
}
