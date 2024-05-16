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
        DB::unprepared('

        CREATE PROCEDURE CountUsers()
        BEGIN
            DECLARE userCount INT;
            
            SELECT COUNT(*) INTO userCount FROM users;
            
            SELECT userCount AS totalUsers;
        END

    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS CountUsers');
    }
};
