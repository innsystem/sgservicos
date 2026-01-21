<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('background_image')->nullable();
            $table->string('satisfied_patients_count')->nullable();
            $table->string('satisfied_patients_label')->nullable();
            $table->json('statistics')->nullable(); // Array de estatísticas
            $table->foreignId('status')->constrained('statuses')->cascadeOnDelete();
            $table->integer('sort_order')->default(0);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('heroes');
    }
};

