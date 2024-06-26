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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id') 
            ->unsigned();
            $table->foreign('product_id')   
            ->references('id')       
            ->on('products')          
            ->onDelete('CASCADE')      
            ->onUpdate('RESTRICT');

            $table->bigInteger('user_id') 
            ->unsigned();
            $table->foreign('user_id')   
            ->references('id')       
            ->on('users')          
            ->onDelete('CASCADE')      
            ->onUpdate('RESTRICT');

            $table->date("date_sale");
            $table->integer('quantity')
            ->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
