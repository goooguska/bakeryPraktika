<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->text('info');
            $table->integer('cost')
            ->default(0);
            $table->integer('quantity')
            ->default(0);
            $table->integer('weight')
            ->default(0);
            $table->string('image', 191);
            $table->string('type', 100);
            $table->timestamps();
          
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
