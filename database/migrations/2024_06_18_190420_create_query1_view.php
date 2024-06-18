<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement($this->dropView());
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement($this->dropView());
    }

    private function createView(): string
    {

        return <<<SQL
    CREATE VIEW query1 AS
    SELECT 
        providers.id, 
        providers.name
    FROM providers
    JOIN ingredients i ON providers.id = i.provider_id
    WHERE i.name = 'мак' 
        AND i.quantity >= 50
        AND providers.date_of_delivery BETWEEN '2023-01-01' AND '2025-01-01'
SQL;
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return <<<SQL

            DROP VIEW IF EXISTS `query1`;
            SQL;
    }
};
