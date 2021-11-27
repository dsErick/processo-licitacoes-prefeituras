<?php

use App\Models\{ActivityType, Contact, Receptivity};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->dateTime('scheduled_at');
            $table->text('observation')->nullable();
            $table->text('pending')->nullable();
            $table->string('status')->nullable();
            $table->foreignIdFor(ActivityType::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(Receptivity::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(Contact::class)->constrained()->onDelete('restrict');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
}
