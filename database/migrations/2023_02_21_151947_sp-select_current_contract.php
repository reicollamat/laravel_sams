<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `get_contract_by_id`;
            CREATE PROCEDURE `get_contract_by_id` (IN idx int)
            BEGIN
            select 
                contracts.id,
                contracts.start_date, 
                contracts.end_date, 
                contracts.daily_wage, 
                locations.id,
                locations.locations_name,
                locations.address
            from contracts
            inner join locations on contracts.id=locations.contract_id
            where contracts.id = idx;
            END;";
  
        \DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
