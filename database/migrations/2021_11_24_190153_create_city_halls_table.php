<?php

use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityHallsTable extends Migration
{
    public function up(): void
    {
        Schema::create('city_halls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number', 11)->nullable();
            $table->unsignedInteger('population')->nullable();
            $table->foreignIdFor(City::class)->constrained()->onDelete('restrict');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('city_halls');
    }
}
