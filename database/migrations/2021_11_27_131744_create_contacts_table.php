<?php

use App\Models\{CityHall, ContactType};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('mandate_ends_at')->nullable();
            $table->foreignIdFor(ContactType::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(CityHall::class)->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
}
