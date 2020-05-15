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
            $table->float('volume');
            $table->string('photo');

            $table
                ->foreign('city_from_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
            $table
                ->foreign('city_to_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loads');
        Schema::table('loads', function (Blueprint $table) {
            $table->dropForeign('city_from_id');
            $table->dropForeign('city_to_id');
        });
    }
}
