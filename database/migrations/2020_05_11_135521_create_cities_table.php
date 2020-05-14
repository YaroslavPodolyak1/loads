<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{

    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->double('lat');
            $table->double('lng');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
}
