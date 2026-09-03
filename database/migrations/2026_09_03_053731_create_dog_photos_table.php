<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dog_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dog_id')->constrained('dogs')->cascadeOnDelete();
            $table->string('filename');
            $table->unsignedInteger('position')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dog_photos');
    }
};
