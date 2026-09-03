<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_items', function (Blueprint $table) {
            $table->id();
            // identifie l'emplacement exact dans le site, ex. "home.hero.title"
            $table->string('content_key', 190)->unique();
            $table->string('page', 60);
            $table->string('label', 190);
            $table->enum('type', ['text', 'richtext', 'image'])->default('text');
            $table->text('value')->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_items');
    }
};
