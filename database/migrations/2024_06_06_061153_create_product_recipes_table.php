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
        Schema::create('product_recipes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id') 
            ->unsigned();
            $table->foreign('product_id')   
            ->references('id')       
            ->on('products')          
            ->onDelete('CASCADE')      
            ->onUpdate('RESTRICT');
            
            $table->bigInteger('recipe_id') 
            ->unsigned();
            $table->foreign('recipe_id')   
            ->references('recipe_id')       
            ->on('recipe_ingredients')          
            ->onDelete('CASCADE')      
            ->onUpdate('RESTRICT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_recipes');
    }
};
