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
            $table->string('name', 55)
            ->unique();
            $table->text('info');
            $table->decimal('cost', 7, 2)
            ->index();
            $table->timestamps();
          
            $table->bigInteger('recipe_id') 
            ->unsigned();
            $table->foreign('recipe_id')   
            ->references('recipe_id')       
            ->on('recipe_ingredients')          
            ->onDelete('CASCADE')      
            ->onUpdate('RESTRICT');
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
