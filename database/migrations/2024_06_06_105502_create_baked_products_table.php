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
        Schema::create('baked_products', function (Blueprint $table) {
            $table->id();
            $table->dateTime("date_baking");
            $table->dateTime("date_sale");
            $table->bigInteger('baker_id') 
            ->unsigned();
            $table->foreign('baker_id')   
            ->references('id')       
            ->on('bakers')          
            ->onDelete('CASCADE')      
            ->onUpdate('RESTRICT');

            $table->bigInteger('productRecipe_id') 
            ->unsigned();
            $table->foreign('productRecipe_id')   
            ->references('id')       
            ->on('product_recipes')          
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
        Schema::dropIfExists('baked_products');
    }
};
