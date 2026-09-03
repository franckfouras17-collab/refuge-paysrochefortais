<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('slug', 100)->unique();
            $table->text('description')->nullable();
            $table->string('age_label', 60)->nullable()->comment('ex: "environ 2 ans"');
            $table->enum('sex', ['male', 'femelle'])->nullable();
            $table->enum('size', ['petit', 'moyen', 'grand'])->nullable();
            $table->enum('status', ['disponible', 'reserve', 'adopte'])->default('disponible');
            $table->unsignedInteger('position')->default(0)->comment("ordre d'affichage sur le site");
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
